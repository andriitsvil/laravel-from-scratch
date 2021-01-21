<?php

namespace App\Http\Controllers;

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

        Mail::raw('It works', function($message) {
            $message->to(\request('email'))->subject('Hello there!');
        });
        return redirect('/contact')->with('message', 'Email sent!');
    }
}
