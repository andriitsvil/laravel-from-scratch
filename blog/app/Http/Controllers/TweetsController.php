<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class TweetsController extends Controller
{
    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function store()
    {
        $attributes = request()->validate([
            'body' => 'required|max:255'
        ]);


        Tweet::create([
            'user_id' => auth()->user()->id,
            'body' => $attributes['body']
        ]);

        return redirect()->route('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
