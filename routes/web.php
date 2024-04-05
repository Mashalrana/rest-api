<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('custom_welcome'); // Retourneer de aangepaste weergave
});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
