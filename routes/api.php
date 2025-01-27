<?php

use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
    Route::apiResource('books', BookController::class)->except('create', 'edit');
    Route::apiResource('authors', AuthorController::class)->except('create', 'edit');
    Route::apiResource('categories', CategoryController::class)->except('create', 'edit');
});