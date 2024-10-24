<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('menus', [MenuController::class, 'index']);
Route::get('menus/{menu}', [MenuController::class, 'show']);
Route::post('menus', [MenuController::class, 'store']);
Route::put('menus/{menu}', [MenuController::class, 'update']);
Route::delete('menus/{menu}', [MenuController::class, 'destroy']);

