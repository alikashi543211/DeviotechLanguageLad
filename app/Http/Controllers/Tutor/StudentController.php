<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentPackage;

class StudentController extends Controller
{
    public function list()
    {
        $list = auth_user()->students;
        return view("tutor.student.list", get_defined_vars());
    }

    public function detail($id)
    {
        $student_package = StudentPackage::findOrFail($id);
        $list = $student_package->booking_requests;
        return view("tutor.student.detail", get_defined_vars());
    }

    public function lessons($id)
    {
        $student_package = StudentPackage::findOrFail($id);
        $list = $student_package->booking_requests;
        return view("tutor.student.lessons", get_defined_vars());
    }

}
