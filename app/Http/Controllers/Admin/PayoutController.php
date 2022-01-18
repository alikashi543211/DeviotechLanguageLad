<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class PayoutController extends Controller
{
    public function list(Request $req)
    {

        $list = Transaction::where('is_refunded', '0')->where('is_captured', '1')->get();
        return view("admin.payout.list", get_defined_vars());
    }
}
