<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Notifications\PaymentReceived;


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
        \request()->user()->notify(new PaymentReceived(700));

        ProductPurchased::dispatch('toy');
    }
}
