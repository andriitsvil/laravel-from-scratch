<?php

namespace App\Http\Controllers;

use App\Models\Tweet;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TweetLikesController extends Controller
{
    /**
     * @param Tweet $tweet
     * @return RedirectResponse
     */
    public function store(Tweet $tweet): RedirectResponse
    {
        $tweet->like(current_user());
        return back();
    }

    /**
     * @param Tweet $tweet
     * @return RedirectResponse
     */
    public function destroy(Tweet $tweet): RedirectResponse
    {
        $tweet->dislike(current_user());
        return back();
    }
}
