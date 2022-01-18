<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function list()
    {
        try
        {
            $list = Transaction::where('student_id', auth_user()->id)->get();
        }catch(\Exception $e)
        {
            return redirect()->route('home')->with("error", $e->getMessage());
        }
        

        return view("student.transaction.list", get_defined_vars());
    }
}
