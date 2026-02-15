<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('create');
})->name('secret.create');

Route::post('/store', [MessageController::class, 'store'])->name('secret.store');

Route::get('/success/{uuid}', function ($uuid) {
    return view('success', ['uuid' => $uuid]);
})->name('secret.success');

Route::get('/reveal/{uuid}', [MessageController::class, 'show'])->name('secret.reveal');
