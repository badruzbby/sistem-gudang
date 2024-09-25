<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\AuthController;

Route::apiResource('barang', BarangController::class)->middleware('auth:sanctum');
Route::apiResource('mutasi', MutasiController::class)->middleware('auth:sanctum');
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('mutasi/barang/{id}/history', [MutasiController::class, 'historyByBarang'])->middleware('auth:sanctum');
Route::get('mutasi/user/{id}/history', [MutasiController::class, 'historyByUser'])->middleware('auth:sanctum');
