<?php

use App\Http\Controllers\RecetController;
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
Route::get('recets/show/{id}', [RecetController::class, 'show'])->name('recets.show');
Route::get('recets/delete/{id}', [RecetController::class, 'destroy'])->name('recets.destroy');
Route::get('recets/edit/{id}', [RecetController::class, 'edit'])->name('recets.edit');
Route::put('recets/edit/{id}', [RecetController::class, 'update'])->name('recets.update');
Route::get('/recets', [RecetController::class, 'index'])->name('recets.index');
Route::get('recets/create', [RecetController::class, 'create'])->name('recets.create');
Route::post('/recets/store', [RecetController::class, 'store'])->name('recets.store');
Route::get('recets/search', [RecetController::class, 'search'])->name('recets.search');







Route::get('/', [RecetController::class, 'index']);

Route::get('/salam/{count}/{age}', function (Request $request){
    return view('salam',['count' => $request->count]);
});
