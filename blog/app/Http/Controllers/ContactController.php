<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class ContactController
 * @package App\Http\Controllers
 */
class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        \request()->validate(['email' => 'required|email']);

        Mail::to(\request('email'))->send(new ContactMe('shirts'));

        return redirect('/contact')->with('message', 'Email sent!');
    }
}
