<?php

namespace App\Http\Controllers\Tutor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaction;

class TransactionController extends Controller
{
    public function list()
    {
        $list = Transaction::whereHas('booking_request', function($q) {
                $q->where('tutor_id', auth_user()->id);
            })
            ->orWhereHas('trial_class', function($q) {
                $q->where('tutor_id', auth_user()->id);
            })
            ->orWhere('payment_method', 'wallet')
            ->get();

        return view("tutor.transaction.list", get_defined_vars());
    }

    public function confirmed()
    {
        return view("tutor.transaction.confirmed", get_defined_vars());
    }
}
