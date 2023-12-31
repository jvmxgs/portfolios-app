<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwords\Confirm;
use App\Livewire\Auth\Passwords\Email;
use App\Livewire\Auth\Passwords\Reset;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Verify;
use App\Livewire\Auth\Logout;
use App\Livewire\Home;
use App\Livewire\Liked;
use App\Livewire\Projects\Index as ProjectIndex;
use App\Livewire\Projects\Create as ProjectCreate;
use App\Livewire\Projects\Edit as ProjectEdit;
use App\Livewire\Projects\Trashed;
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

Route::get('/', Home::class)->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');

    Route::get('logout', Logout::class)
        ->name('logout');

    Route::get('projects', ProjectIndex::class)
        ->name('projects');
    Route::get('projects/create', ProjectCreate::class)
        ->name('projects.create');
    Route::get('projects/{id}/edit', ProjectEdit::class)
        ->name('projects.edit');

    Route::get('liked', Liked::class)
        ->name('liked');

    Route::get('projects/trashed', Trashed::class)
        ->name('trashed');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');
});
