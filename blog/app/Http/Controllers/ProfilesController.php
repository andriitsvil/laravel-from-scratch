<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\Request;


class ProfilesController extends Controller
{
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }
}
