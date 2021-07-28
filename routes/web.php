<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Route::get('/', [ItemController::class, "index"])->name('homepage');
Route::match(["get","post"], '/inset', [ItemController::class, "insert"])->name('insert');
Route::post('/insertCat', [ItemController::class, "insertCat"])->name('insertCat');

