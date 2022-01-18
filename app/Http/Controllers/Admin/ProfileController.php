<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class ProfileController extends Controller
{
    public function index($tab = "general")
    {
        $user = User::where('id',auth()->user()->id)->first();
        return view('admin.profile', get_defined_vars());
    }

    public function generalUpdate(Request $req)
    {
        $req->validate([
           'name' => 'required',
           'email' => 'required',
        ]);
        User::where('id', auth()->user()->id)->update([
            'name' => $req->name,
            'email' => $req->email,
        ]);
        return redirect()->back()->with('success', 'Profile updated successfully');

    }
    public function passwordUpdate(Request $req)
    {
        $req->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);
        User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($req->password),
        ]);
        return redirect()->route('admin.profile', 'security')->with('success', 'Password updated successfully');
    }
}
