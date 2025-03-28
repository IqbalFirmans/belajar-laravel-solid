<?php

use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::get('menu/{menu}', [MenuController::class, 'edit'])->name('menu.edit');
Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
Route::put('menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');
