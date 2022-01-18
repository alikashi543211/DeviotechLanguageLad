<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentPackage;

class PackageController extends Controller
{
    public function list()
    {
        $list = StudentPackage::where('student_id', auth_user()->id)->get();
        return view("student.package.list", get_defined_vars());
    }

    public function detail($id)
    {
        $student_package = StudentPackage::findOrFail($id);
        $list = $student_package->booking_requests;
        return view("student.package.detail", get_defined_vars());
    }

    public function lessons($id)
    {
        $student_package = StudentPackage::findOrFail($id);
        $list = $student_package->booking_requests;
        return view("student.package.lessons", get_defined_vars());
    }

    public function schedule($id)
    {
        $student_package = StudentPackage::findOrFail($id);
        $username = $student_package->tutor->username."?sp=".base64_encode($id);

        return redirect()->route('detail', $username)->with("success", "Schedule Your New Booking Request Here");
    }

    

}
