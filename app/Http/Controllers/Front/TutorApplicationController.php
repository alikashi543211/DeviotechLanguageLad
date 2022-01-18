<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TutorLesson;
use App\Models\TutorProfile;
use App\Models\User;
use Auth;
use Session;
use App\Providers\RouteServiceProvider;
use App\Models\TutorSpeak;
use App\Models\StudentSpeak;
use App\Models\TutorLessonPackage;
use App\Models\TutorCertificate;
use App\Models\TutorEducation;
use App\Models\TutorExperience;
use App\Rules\SpeakRule;
use App\Rules\LessonPackageRule;
use Illuminate\Auth\Events\Registered;
use Hash;
use Str;

class TutorApplicationController extends Controller
{
    public function general()
    {
        return view("front.tutor_application.general", get_defined_vars());
    }

    public function lesson()
    {
        return view("front.tutor_application.lesson", get_defined_vars());
    }

    public function certificate()
    {
        return view("front.tutor_application.certificate", get_defined_vars());
    }

    public function finish(Request $req)
    {
        if(isset($req->app))
        {
            $tutor = tutor();
            $tutor->step = '3';
            $tutor->save();
            sendMail([
                "view"    =>  "emails.tutor.application_complete",
                "data"    =>  get_defined_vars(),
                "to"      =>  $tutor->user->email,
                "subject" =>  "Application Submitted",
            ]);
            return redirect()->route('tutor.application.finish')->with('success', 'Resume And Certificates Added Successfully');
        }

        return view("front.tutor_application.finish", get_defined_vars());
    }


    public  function saveGeneral(Request $req)
    {

        $messages = [
            'image.required' => 'Upload your profile image',
            'image.image' => 'Select valid image',
            'image.mimes' => 'Select valid image',
            'native_language.required' => 'Enter your native language',
            'name.required' => 'Enter your name',
            'country.required' => 'Enter your country name',
            'city.required' => 'Enter your city',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter Password Of 8 Characters',
            'password.max' => 'Enter Password Of 8 Characters',
            'terms_conditions.required' => 'You must agree terms and condtions.',
        ];
        $rules = [
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg'],
            'native_language' => ['required'],
            'country' => ['required','string','max:95'],
            'lives_in' => ['required','string','max:95'],
            'description' => ['required','string'],
            'hourly_rate' => ['required'],
            'language' => [new SpeakRule()],
        ];

        $this->validate($req, $rules, $messages);
        $is_free_trial = 0;
        if(!is_null($req->availability))
        {
            $is_free_trial = 1;
        }

        $user = auth()->user();
        if(isset($req->image))
        {
            $tutor_image = uploadFile($req->image, 'uploads/tutors/'.$user->id, 'profile-picture');
        }

        $tutor_profile = tutor();
        TutorProfile::where('id', tutor()->id)->update([
            "user_id" => $user->id,
            "image" => $tutor_image ?? tutor()->image ?? null,
            "country" => $req->country,
            "lives_in" => $req->lives_in,
            "native_language" => $req->native_language,
            'description' => $req->description,
            'hourly_rate' => $req->hourly_rate,
            'is_free_trial' => $is_free_trial,
        ]);
        
        if(count(auth()->user()->tutor_speaks) > 0)
        {
           auth()->user()->tutor_speaks()->delete(); 
        }

        if(isset($req->language))
        {
            foreach($req->language as $key => $lang)
            {
                TutorSpeak::create(['tutor_id' => $user->id,
                    'language' => $lang,
                    'level' => $req->level[$key]]);
            }
        }

        if($tutor_profile->step == '0')
        {
            $tutor_profile->step = "1";
            $tutor_profile->save(); 
        }
        return redirect()->route('tutor.application.lesson')->with('success', 'General Info Saved Successfully');
    }

    public function saveLesson(Request $req)
    {
        $messages = [
            'title.required' => 'Enter title',
            'description.required' => 'Enter description',
            'language.required' => 'Select language',
            'level_from.required' => 'Select level from',
            'level_to.required' => 'Select level to',
            'category.required' => 'Select category',
            'tag.required' => 'Select tag',
        ];

        $rules = [
            'title' => ['required'],
            'description' => ['required'],
            'language' => ['required'],
            'level_from' => ['required'],
            'level_to' => ['required'],
            'category' => ['required'],
            'tag' => ['required'],
        ];

        $this->validate($req, $rules, $messages);

        $tutor = auth()->user();
        $is_update = false;
        if(isset($req->id))
        {
            $is_update = true;
            $tutor_lesson = TutorLesson::find($req->id);
            TutorLesson::where('id', $req->id)->update([
                'tutor_id' => $tutor->id, 
                'title' => $req->title,
                'description' => $req->description,
                'language' => $req->language,
                'level_from' => $req->level_from,
                'level_to' => $req->level_to,
                'category' => $req->category,
                'tag' => $req->tag,
            ]);
        }else{
            $tutor_lesson = TutorLesson::create([
                'tutor_id' => $tutor->id, 
                'title' => $req->title,
                'description' => $req->description,
                'language' => $req->language,
                'level_from' => $req->level_from,
                'level_to' => $req->level_to,
                'category' => $req->category,
                'tag' => $req->tag,
            ]);
        }

        // dd(TutorLessonPackage::where('tutor_lesson_id', $tutor_lesson->id)->count(), $tutor_lesson->id);

        for($k = 0; $k < 3; $k++)
        {
            $t_package = TutorLessonPackage::where('tutor_lesson_id', $tutor_lesson->id)
                ->where('package_number', $k+1)
                ->first();
            if(isset($req->status[$k]))
            {
                $status = true;
            }else{
                $status = false;
            }
            if(is_null($t_package))
            {
                
                // dd("Creating");
                TutorLessonPackage::create([
                    'tutor_id' => $tutor->id,
                    'tutor_lesson_id' => $tutor_lesson->id,
                    'status' => $status,
                    'interval' => $req->interval[$k] ?? null,
                    'amount_per_interval' => $req->amount_per_interval[$k] ?? null,
                    'package' => $req->package[$k] ?? null,
                    'total_amount' => $req->total_amount[$k] ?? null,
                    'package_number' => $k+1,
                ]); 
            }else{
                TutorLessonPackage::where('id', $t_package->id)
                    ->update([
                        'status' => $status,
                        'interval' => $req->interval[$k] ?? null,
                        'amount_per_interval' => $req->amount_per_interval[$k] ?? null,
                        'package' => $req->package[$k] ?? null,
                        'total_amount' => $req->total_amount[$k] ?? null
                    ]);
            }
            
        }
        

        if($is_update)
        {
            
        }else{
            $tutor_profile = tutor();
            $tutor_profile->step = "2";
            $tutor_profile->save();
        }
        return redirect()->route('tutor.application.certificate')->with("success", "Lesson Added Successfully");
        
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

    public function load_experience_edit(Request $req)
    {
        $item = TutorExperience::find($req->id);
        return view("ajax.front.tutor_application.edit_experience", get_defined_vars());
    }

    public function load_education_edit(Request $req)
    {
        $item = TutorEducation::find($req->id);
        return view("ajax.front.tutor_application.edit_education", get_defined_vars());
    }

}
