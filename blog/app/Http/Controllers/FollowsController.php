<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store($providedUser): RedirectResponse
    {
        $providedUser = User::find($providedUser); // TODO without this string is not working - User not provides through request
        auth()->user()->toggleFollow($providedUser);
        return back();
    }
}
