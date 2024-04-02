<?php

use App\Http\Controllers\DepartmenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, "indexKaryawan2"]);
Route::put('/update-karyawan/{id}', [KaryawanController::class, 'updateKaryawan'])->name('update-karyawan');
Route::get('/jabatan', [JabatanController::class, 'indexJabatan']);
Route::get('/departmen', [DepartmenController::class, 'indexDepartmen2']);
