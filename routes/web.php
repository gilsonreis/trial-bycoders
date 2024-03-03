<?php

use App\Livewire\{Auth\Login, Dashboard, Users\Profile};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('auth.login'));
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('profile', Profile::class)->name('profile');
    });
});
