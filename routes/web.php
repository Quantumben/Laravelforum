<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\UsersController;

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

Auth::routes(['verify'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('discussion', DiscussionsController::class);

route::get('users/notifications', [UsersController::class, 'notifications'])->name('users.notifications');

Route::resource('discussion/{discussion}/replies', RepliesController::class);

Route::post('discussion/{discussion}/replies/{reply}/mark-as-best-reply',[DiscussionsController::class,'reply'] )->name('discussions.best-reply');
