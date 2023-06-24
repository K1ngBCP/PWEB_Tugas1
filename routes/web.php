<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\wisataController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('kategori', [kategoriController::class, 'showData']);
Route::get('kategori/insert', [kategoriController::class, 'insert']);
Route::post('kategori/insert', [kategoriController::class, 'addData']);
Route::get('/kategori/edit/{id}', [kategoriController::class, 'editData']);
Route::post('/kategori/update', [kategoriController::class, 'updateData']);
Route::post('kategori/delete', [kategoriController::class, 'deleteData']);

Route::get('objek', [wisataController::class, 'showData']);
Route::get('/objek/insertWisata', [wisataController::class, 'insertWisata']);
Route::post('objek/insertWisata', [wisataController::class, 'addData']);
Route::get('/objek/editWisata/{id}', [wisataController::class, 'editData']);
Route::post('/objek/update', [wisataController::class, 'updateData']);
Route::post('/objek/delete', [wisataController::class, 'deleteData']);


