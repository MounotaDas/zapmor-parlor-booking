<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/book-now', function () {
    $services = \App\Models\Service::all();
    $parlors = \App\Models\Parlor::where('availability_status', true)->get();

    return view('book-now', compact('services', 'parlors'));
})->name('book.now');

Route::post('/book-now', [BookingController::class, 'store'])
    ->name('booking.store');