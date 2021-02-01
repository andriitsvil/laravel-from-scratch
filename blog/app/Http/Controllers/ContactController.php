<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
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

        Mail::to(\request('email'))->send(new Contact());

        return redirect('/contact')->with('message', 'Email sent!');
    }
}
