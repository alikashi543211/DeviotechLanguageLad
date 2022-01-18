<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\User;

class StudentController extends Controller
{
    public function list()
    {
        $list = User::has("student_profile")->get();
        return view("admin.student.list", get_defined_vars());
    }

    public function delete($id = null)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with("success", "Deleted Successfully");
    }

    public function detail($id = null)
    {
        $item = User::findOrFail($id);
        return view("admin.student.detail", get_defined_vars());
    }
}
