<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    $user = Auth::user();

    if ($user->ref_id_role === 1) {
        return view('homeEmployee');
    } elseif ($user->ref_id_role === 2) {
        return view('homeClient');
    }

    abort(403); 
    // Forbidden if role is not recognized
})->middleware('auth');