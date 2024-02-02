<?php

use App\Http\Controllers\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('recets', [\App\Http\Controllers\RecetController::class, 'index']);
Route::get('recets/create', [\App\Http\Controllers\RecetController::class, 'create']);
Route::post('/recets/store', [\App\Http\Controllers\RecetController::class, 'store']);
Route::get('recets/edit/{id}', [\App\Http\Controllers\RecetController::class, 'edit']);
Route::put('recets/edit/{id}', [\App\Http\Controllers\RecetController::class, 'update']);
Route::get('recets/delete/{id}', [\App\Http\Controllers\RecetController::class, 'destroy']);






Route::get('/', [Test::class, 'index']);

Route::get('/salam/{count}/{age}', function (Request $request){
    return view('salam',['count' => $request->count]);
});
