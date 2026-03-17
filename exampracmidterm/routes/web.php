<?php

use App\Http\Controllers\empController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [empController::class, 'index']);
Route::post('/register', [empController::class, 'store'])->name('register');
Route::get('/delete/{id}', [empController::class, 'destroy'])->name('delete');
Route::post('/timein', [empController::class, 'timeIn'])->name('timein');
Route::get('/form1', function() {
    return view('form1');

});
Route::post('/form1', [UserController::class, 'form1send'])->name('form1.send');