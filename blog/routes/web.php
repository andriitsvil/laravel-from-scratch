<?php

use Illuminate\Support\Facades\{Auth, Route};

use App\Http\Controllers\{ExploreController,
    FollowsController,
    TweetLikesController,
    TweetsController,
    ProfilesController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetsController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetsController::class, 'store']);
    Route::post('/profiles/{user:username}/follow', [FollowsController::class, 'store'])->name('follow');
    Route::get('/profiles/{user:username}/edit', [ProfilesController::class, 'edit'])->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', [ProfilesController::class, 'update'])->middleware('can:edit,user');
    Route::get('/explore', ExploreController::class);
    Route::post('/tweets/{tweet}/like', [TweetLikesController::class, 'store']);
    Route::delete('/tweets/{tweet}/like', [TweetLikesController::class, 'destroy']);
});

Route::get('/profiles/{user:username}', [ProfilesController::class, 'show'])->name('profile');

Auth::routes();
