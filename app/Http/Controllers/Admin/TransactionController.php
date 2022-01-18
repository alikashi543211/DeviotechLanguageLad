<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $req)
    {

        $list = Transaction::all();
        $admin_earning = $list->sum('admin_amount');
        $total_earning = $list->sum('amount');

        return view("admin.transaction.list", get_defined_vars());
    }
}
