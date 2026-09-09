<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/book-now', function () {
    return view('book-now');
})->name('book.now');