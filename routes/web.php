<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;

Route::get('/', function () {
    return redirect('/diagnosa'); // Redirect halaman utama ke /diagnosa
});

Route::get('/diagnosa', [DiagnosaController::class, 'showDiagnosaForm'])->name('diagnosa.form');
Route::post('/diagnosa', [DiagnosaController::class, 'prosesDiagnosa'])->name('diagnosa.proses');

