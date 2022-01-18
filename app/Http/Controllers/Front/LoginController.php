<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Rules\LoginPasswordRule;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
use Session;


class LoginController extends Controller
{
    public function login(Request $request)
    {

        $messages = [
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 8 characters"
        ];

        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ];

        $this->validate($request, $rules, $messages);

        $user = User::where("email", $request->email)->first();
        $password = $user->password;
        
        $request->validate([
            'password' => [new LoginPasswordRule($password)]
        ]);

        // attempt to log
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) 
        {
            // if successful -> redirect forward
            if(auth()->user()->role == "admin")
            {
                return redirect()->intended(route('admin.dashboard'));
            }
            if(auth()->user()->role == "tutor")
            {
                return redirect()->intended(route('tutor.dashboard'));
            }
            if(auth()->user()->role == "student")
            {
                return redirect()->intended(route('student.dashboard'));
            }
            
        }else{
            return redirect()->route('login');
        }
        
    }
}
