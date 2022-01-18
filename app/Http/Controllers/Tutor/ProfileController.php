<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TutorProfile;
use App\Models\TutorSpeak;
use App\Models\TutorCertificate;
use App\Models\TutorEducation;
use App\Models\TutorExperience;
use App\Models\TutorLesson;
use App\Models\TutorLessonPackage;
use App\Rules\UpdateEmailRule;
use App\Rules\SpeakRule;
use Str;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function profile(Request $req)
    {
        return view("tutor.profile.profile", get_defined_vars());
    }

    public function general(Request $req)
    {
        return view("tutor.profile.general", get_defined_vars());
    }

    public function certificate()
    {
        return view("tutor.profile.certificate", get_defined_vars());
    }

    public function generalSave(Request $req)
    {
        $messages = [
            'image.required' => 'Upload your profile image',
            'image.image' => 'Select valid image',
            'image.mimes' => 'Select valid image',
            'native_language.required' => 'Enter your native language',
            'name.required' => 'Enter your name',
            'country.required' => 'Enter your country name',
            'city.required' => 'Enter your city',
        ];
        $rules = [
            'name' => ['required','string','max:95'],
            'email' => ['required','string', new UpdateEmailRule()],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'native_language' => ['required'],
            'country' => ['required','string','max:95'],
            'lives_in' => ['required','string','max:95'],
            'language' => [new SpeakRule()],
        ];

        $this->validate($req, $rules, $messages);

        User::where('id', auth()->user()->id)
            ->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);
        
        $user = auth_user();

        if(isset($req->image))
        {
            $tutor_image = uploadFile($req->image, 'uploads/tutors/'.auth()->user()->id, 'profile-picture');
        }

        TutorProfile::where('user_id', auth()->user()->id)->update([
            "user_id" => auth_user()->id,
            "image" => $tutor_image ?? tutor()->image ?? null,
            "country" => $req->country,
            "lives_in" => $req->lives_in,
            "native_language" => $req->native_language,
            'description' => $req->description,
            'video_url' => $req->video_url,
            "embed_video_url" => $req->embed_video_url,
            'hourly_rate' => $req->hourly_rate,
        ]);

        $user->timezone = $req->timezone;
        $user->save();
        
        auth()->user()->tutor_speaks()->delete();
        
        if(isset($req->language))
        {
            foreach($req->language as $key => $lang)
            {
                TutorSpeak::create(['tutor_id' => auth()->user()->id,
                    'language' => $lang,
                    'level' => $req->level[$key]]);
            }
        }
        return redirect()->back()->with('success', 'General Info Updated Successfully');
    }

    public function saveCertificate(Request $req)
    {
        $messages = [
            'date.required' => 'Enter date',
            'name.required' => 'Enter name',
            'institution.required' => 'Enter institution name',
            'work_experiance.required' => 'Enter work experiance',
            'training.required' => 'Enter training',
            'attachment.required' => 'Upload resume to show your qualification',
            'attachment.mimes' => 'Upload resume in pdf format',
            'attachment.max' => 'File size must be 2 MB',
        ];

        $rules = [
            'date' => ['required'],
            'name' => ['required'],
            'institution' => ['required'],
            'work_experiance' => ['required'],
            'training' => ['required'],
            'attachment' => ['mimes:pdf', 'max:2048'],
        ];

        $this->validate($req, $rules, $messages);

        $tutor = auth()->user();

        $tutor_certificate = TutorCertificate::find($req->id);

        if(isset($req->attachment))
        {
            $tutor_attachment = uploadFile($req->attachment, 'uploads/tutors/'.$tutor->id, 'certificate-attachment');
        }
        TutorCertificate::where('id', $req->id)
            ->update([
            'tutor_id' => $tutor->id, 
            'date' => $req->date,
            'name' => $req->name,
            'institution' => $req->institution,
            'description' => $req->description,
            'work_experiance' => $req->work_experiance,
            'training' => $req->training,
            'attachment' => $tutor_attachment ?? $tutor_certificate->attachment ?? null,
        ]); 
        return redirect()->back()->with("success", "Certificate Updated Successfully");
    }

    public function saveEducation(Request $req)
    {
        $messages = [
            'degree.required' => 'Enter degree name',
            'institution.required' => 'Enter institution name',
            'attachment.required' => 'Upload resume to show your qualification',
            'attachment.mimes' => 'Upload resume in pdf format',
            'attachment.max' => 'File size must be 2 MB',
        ];

        $rules = [
            'from' => ['required'],
            'degree' => ['required'],
            'institution' => ['required'],
            'attachment' => ['mimes:pdf', 'max:2048'],
        ];

        $this->validate($req, $rules, $messages);

        $tutor = auth()->user();

        if(!isset($req->availability))
        {
            $to = $req->to;
        }else{
            $to = null;
        }

        if(isset($req->attachment))
        {
            $tutor_attachment = uploadFile($req->attachment, 'uploads/tutors/'.$tutor->id, 'education-attachment');
        } 

        if(isset($req->id))
        {
            $edu = TutorEducation::where('id', $req->id)->first();
            TutorEducation::where('id', $req->id)
                ->update([
                'tutor_id' => $tutor->id, 
                'from' => $req->from,
                'to' => $to,
                'institution' => $req->institution,
                'degree' => $req->degree,
                'attachment' => $tutor_attachment ?? $edu->attachment ?? null,
            ]);
            $message = "Education Updated Successfully";
        }else{
            TutorEducation::create([
                'tutor_id' => $tutor->id, 
                'from' => $req->from,
                'to' => $to,
                'institution' => $req->institution,
                'degree' => $req->degree,
                'attachment' => $tutor_attachment ?? null,
            ]);
            $message = "Education Added Successfully";
        }
        return redirect()->back()->with("success", $message);
    }

    public function saveExperience(Request $req)
    {
        $messages = [
            'designation.required' => 'Enter designation',
            'company.required' => 'Enter company name',
            'attachment.required' => 'Upload resume to show your qualification',
            'attachment.mimes' => 'Upload resume in pdf format',
            'attachment.max' => 'File size must be 2 MB',
        ];

        $rules = [
            'from' => ['required'],
            'designation' => ['required'],
            'company' => ['required'],
        ];

        $this->validate($req, $rules, $messages);

        $tutor = auth()->user();
        if(!isset($req->availability))
        {
            $to = $req->to;
        }else{
            $to = null;
        }

        if(isset($req->id))
        {
            TutorExperience::where('id', $req->id)
                ->update([
                'tutor_id' => $tutor->id, 
                'from' => $req->from,
                'to' => $to,
                'company' => $req->company,
                'designation' => $req->designation,
            ]);
            $message = "Experience Updated Successfully";
        }else{
            TutorExperience::create([
                'tutor_id' => $tutor->id, 
                'from' => $req->from,
                'to' => $to,
                'company' => $req->company,
                'designation' => $req->designation,
            ]);
            $message = "Experience Added Successfully";
        }
         
        return redirect()->back()->with("success", $message);
    }

    
    public function delete_experience($id)
    {
        TutorExperience::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Experience Deleted Successfully");
    }

    public function delete_education($id)
    {
        TutorEducation::findOrFail($id)->delete();
        return redirect()->back()->with("success", "Education Deleted Successfully");
    }

    public function update_password(Request $req)
    {
        $user = auth_user();
        $password = $user->password;

        $messages = [
            'old_password.required' => 'Enter your name',
            'password.required' => 'Enter your email address',

        ];
        
        $rules = [
            'old_password' => ['required'],
            'password' => ['required','confirmed'],
        ];

        $this->validate($req, $rules, $messages);

        if (Hash::check($req->old_password, $password)) 
        {
            //add logic here
            $user->password = Hash::make($req->password);
            $user->save();

            Auth::logout();
            return redirect()->route('login')->with('success','Password Changed Successfully');
        }
        else
        {
            return redirect()->route('tutor.profile.profile', ['tab' => 'password_tab'])->with('error','Incorrect Old Password');
        }
    }



    // Ajax Functions
    public function load_general_info(Request $req)
    {
        return view("ajax.tutor.profile.general", get_defined_vars());
    }

    public function load_certificate(Request $req)
    {
        return view("ajax.tutor.profile.certificate", get_defined_vars());
    }

    public function load_password(Request $req)
    {
        return view("ajax.tutor.profile.password", get_defined_vars());
    }

    public function load_experience_edit(Request $req)
    {
        $item = TutorExperience::find($req->id);
        return view("ajax.tutor.profile.edit_experience", get_defined_vars());
    }

    public function load_education_edit(Request $req)
    {
        $item = TutorEducation::find($req->id);
        return view("ajax.tutor.profile.edit_education", get_defined_vars());
    }
    

}
