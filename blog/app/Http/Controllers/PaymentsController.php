<?php

namespace App\Http\Controllers;

use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;


/**
 * Class PaymentsController
 * @package App\Http\Controllers
 */
class PaymentsController extends Controller
{

    public function create()
    {
        return view('payments.create');
    }


    public function store(): void
    {
        \request()->user()->notify(new PaymentReceived());
        //Notification::send(\request()->user(), new PaymentReceived());
    }
}
