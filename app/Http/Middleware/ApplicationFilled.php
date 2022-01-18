<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\TutorProfile;
use Auth;

class ApplicationFilled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $profile = TutorProfile::where('user_id', auth()->user()->id)
            ->where('step', '3')
            ->first();
        if(!is_null($profile)){
            return $next($request);
        }else{
            return redirect()->route('tutor.application.general')->with('error', 'Please complete your application to access dashboard');
        }
        
    }
}
