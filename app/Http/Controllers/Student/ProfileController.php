<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\StudentSpeak;
use App\Rules\UpdateEmailRule;
use App\Rules\SpeakRule;
use Str;
use Auth;
use Hash;

class ProfileController extends Controller
{
    public function profileSave(Request $req)
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
            'username' => Str::slug($req->name),
            'email' => $req->email,
            'timezone' => $req->timezone,
        ]);

        if(isset($req->image))
        {
            $student_image = uploadFile($req->image, 'uploads/tutors/'.auth()->user()->id, 'profile-picture');
        }

        StudentProfile::where('user_id', auth()->user()->id)->update([
            "user_id" => auth_user()->id,
            "image" => $student_image ?? student()->image ?? null,
            "country" => $req->country,
            "lives_in" => $req->lives_in,
            "native_language" => $req->native_language,
        ]);

        auth()->user()->student_speaks()->delete();

        if(isset($req->language) && !is_null($req->language[0]))
        {
            foreach($req->language as $key => $lang)
            {
                StudentSpeak::create(['student_id' => auth()->user()->id,
                    'language' => $lang,
                    'level' => $req->level[$key]]);
            }
        }
        return redirect()->back()->with('success', 'Profile Updated Successfully');
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
            return redirect()->route('student.profile.edit', ['tab' => 'password_tab'])->with('error','Incorrect Old Password');
        }
    }


    // Ajax Functions
    public function load_general_info(Request $req)
    {
        return view("ajax.student.profile.general", get_defined_vars());
    }

    public function load_password(Request $req)
    {
        return view("ajax.student.profile.password", get_defined_vars());
    }

}
