<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Validation\Rule;


class ProfilesController extends Controller
{
    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(50)
        ]);
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'username' => ['string', 'max:255', 'required', Rule::unique('users')->ignore($user), 'alpha_dash'],
            'avatar' => ['file'],
            'name' => ['string', 'max:255', 'required'],
            'email' => ['string', 'required', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'password' => ['string', 'required', 'min:8', 'max:255', 'confirmed']
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);
        return redirect($user->path());
    }
}
