<?php

use App\Http\Controllers\ConversationBestReplyController;
use App\Http\Controllers\ConversationsController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
auth()->loginUsingId(6);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('conversations', [ConversationsController::class, 'index']);
Route::get('conversations/{conversation}', [ConversationsController::class, 'show'])->middleware('can:view,conversation');

Route::post('best-replies/{reply}', [ConversationBestReplyController::class, 'store']);

Route::get('/reports', function () {
    return 'secret reports';
})->middleware('can:view_reports');
