<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('login/google', [GoogleController::class, 'login']);
Route::get('login/google/callback', [GoogleController::class, 'callback']);
// Route::post('account/contact', 'AccountController@attachContacts()');

Route::resource('account', AccountController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('contact', ContactController::class)->middleware('auth');
Route::resource('project', ProjectController::class)->middleware('auth');

