<?php

use App\Http\Controllers\DepartmenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Karyawan

Route::get('/data-karyawan', [KaryawanController::class, 'indexKaryawan']);
Route::post('/create-karyawan', [KaryawanController::class, 'createKaryawan']);
Route::put('/update-karyawan/{id}', [KaryawanController::class, 'updateKaryawan']);
Route::get('/detail-karyawan/{id}', [KaryawanController::class, 'detailKaryawan']);
Route::delete('/delete-karyawan/{id}', [KaryawanController::class, 'deleteKaryawan']);
Route::get('/hitung-karyawan', [KaryawanController::class, 'countKaryawan']);

// Jabatan

Route::get('/data-jabatan', [JabatanController::class, 'dataJabatan']);
Route::post('/create-jabatan', [JabatanController::class, 'createJabatan']);
Route::put('/update-jabatan/{id}', [JabatanController::class, 'updateJabatan']);
Route::delete('/delete-jabatan/{id}', [JabatanController::class, 'deleteJabatan']);
Route::get('/hitung-jabatan', [JabatanController::class, 'countJabatan']);

// Department

Route::get('/data-departmen', [DepartmenController::class, 'indexDepartmen']);
Route::post('/create-departmen', [DepartmenController::class, 'createDepartment']);
Route::put('/update-departmen/{id}', [DepartmenController::class, 'updateDepartmen']);
Route::delete('/delete-departmen/{id}', [DepartmenController::class, 'deleteDepartmen']);
Route::get('/hitung-department', [DepartmenController::class, 'countDepartmen']);
