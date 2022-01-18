<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\TutorProfile;
use App\Models\StudentProfile;
use App\Models\StudentSpeak;
use App\Models\TutorSpeak;
use Session;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $req)
    {
        return view('auth.register');
        
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $req)
    {
        $messages = [
            'name.required' => 'Enter your name',
            'timezone.required' => 'Select your timezone',
            'email.required' => 'Enter your email address',
            'password.required' => 'Enter your password',
            'password.confirmed' => 'Confirm your password',
            'password.min' => 'Enter at least 8 characters password',
            'password.max' => 'Enter a stronger password',
            'terms_conditions.required' => 'You must agree terms and condtions.',

        ];
        $rules = [
            'name' => ['required','string','max:95'],
            'email'=>'required|email'.(!authCheck() ? '|unique:users' : ''),
            'password' => ['required','min:8','confirmed'],
            'timezone' => 'required',
            'terms_conditions' => 'required',
        ];

        $this->validate($req, $rules, $messages);
        
        $user = User::create([
            'name' => $req->name,
            'username' => Str::slug($req->name).Str::random(3),
            'email' => $req->email,
            'role' => $req->role,
            'password' => Hash::make($req->password),
            'timezone' => $req->timezone,
        ]);

        // dd($user->timezone);
        if(isset($req->image))
        {
            $messages = [
                'image.image' => 'Select valid image',
                'image.mimes' => 'Select valid image',

            ];
            $rules = [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            ];

            $this->validate($req, $rules, $messages);

            if ($req->image) {
                $student_image = uploadFile($req->image, 'uploads/students/'.$user->id, 'profile-picture');
            }
        }
        if($req->role == 'student')
        {
            StudentProfile::create([
                "user_id" => $user->id,
                "image" => $student_image ?? null,
            ]);
        }elseif($req->role == 'tutor')
        {
            TutorProfile::create([
                "user_id" => $user->id,
            ]);
        }
        
        event(new Registered($user));

        Auth::login($user);
        
        if($req->role == 'student')
        {
            Session::flash("success", "You Registerd Successfully");
            return redirect(RouteServiceProvider::STUDENT);   
        }elseif($req->role == 'tutor')
        {
            Session::flash("success", "Provide Your Profile Information Here");
            return redirect()->route("tutor.application.general");
        }
        
    }
}
