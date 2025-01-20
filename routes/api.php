<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');

Route::apiResource('titles', TitleController::class);
Route::post('titles/restore/{title}', [TitleController::class, 'restore'])->name('titles.restore');

Route::apiResource('authors', AuthorController::class);
Route::post('authors/restore/{author}', [AuthorController::class, 'restore'])->name('authors.restore');
