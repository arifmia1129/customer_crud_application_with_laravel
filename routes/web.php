<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('customers/trash', [CustomerController::class, 'trashIndex'])->name('customers.trash');
Route::resource('customers', CustomerController::class);