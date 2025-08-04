<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ElectricityRateController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
// use App\Models\Invoice;
// use App\Models\Payment;
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

Route::controller(ClientController::class)->group(function () {

    Route::get('/clientData', 'index')->name('clientIndex');
    Route::get('/clientData/baru', 'create');
    Route::post('/clientData/baru', 'insert');
    Route::get('/clientData/{id}', 'detail');
    Route::delete('/clientData/delete/{id}', 'destroy');
    // Route::post('/orders', 'store');

})->middleware('auth');

Route::controller(ElectricityRateController::class)->group(function () {

    Route::get('/tarifData', 'index')->name('tarifIndex');
    Route::post('/tarifData/baru', 'insert');
    Route::delete('/tarifData/delete/{id}', 'destroy');

})->middleware('auth');

Route::controller(InvoiceController::class)->group(function () {

    Route::get('/invoiceData', 'index')->name('invoiceIndex');
    Route::get('/invoiceData/generate', 'checkUsage');
    // Route::post('/invoiceData/baru', 'insert');
    // Route::get('/invoiceData/{id}', 'detail');
    // Route::delete('/invoiceData/delete/{id}', 'destroy');
    // Route::post('/orders', 'store');

})->middleware('auth');

Route::controller(PaymentController::class)->group(function () {

    Route::get('/paymentsData', 'index')->name('paymentIndex');

})->middleware('auth');