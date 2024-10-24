<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('menu/{menu}', [MenuController::class, 'edit'])->name('menus.edit');
Route::put('menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
