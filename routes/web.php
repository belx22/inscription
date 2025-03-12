<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\GymnasteController;



Route::get('/', [homeController::class, 'index'])->name('home');

Route::resource('juges', App\Http\Controllers\JugeController::class);
Route::resource('gymnastes', App\Http\Controllers\GymnasteController::class);
Route::get('/pdf/juges/{juge}', [JugeController::class, 'generatePDF'])->name('juges.pdf');
Route::get('/pdf/gymnastes/{gymnaste}', [GymnasteController::class, 'generatePDF'])->name('gymnastes.pdf');



Route::get('/pdf/juges/{juge}', [JugeController::class, 'generatePDF'])->name('juges.pdf');

