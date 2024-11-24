<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataHandler;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('list', [DataHandler::class, 'index'])->name('stulist');

Route::get('/', [DataHandler::class, 'create'])->name('product');
Route::post('data', [DataHandler::class, 'store'])->name('storedata');
Route::get('deletedata/{id}', [DataHandler::class, 'delete']);
Route::get('edit/{id}', [DataHandler::class, 'edit']);
