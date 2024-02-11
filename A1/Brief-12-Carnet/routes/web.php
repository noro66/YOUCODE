<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\RecetController;
use App\Http\Controllers\Test;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
//Route::prefix('recets')->name('recets.')->group(function (){
//    Route::controller(RecetController::class)->group(function (){
//        Route::get('/','index')->name('index');
//        Route::get('/show/{recet}','show')->name('show');
//        Route::delete('/delete/{recet}','destroy')->name('destroy');
//        Route::get('/edit/{recet}','edit')->name('edit');
//        Route::put('/edit/{recet}','update')->name('update');
//        Route::get('/create','create')->name('create');
//        Route::post('/','store')->name('store');
//        Route::get('/search','search')->name('search');
//    });
//});

Route::resource('recets', RecetController::class);
Route::get('recets/search',[ RecetController::class , 'search'])->name('recets.search');

Route::resource('profile', ProfileController::class);


Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout.index')->middleware('auth');

Route::get('/google', function (){
   return redirect()->away('https://google.com');
});

Route::resource('publication', PublicationController::class);

//Route::get('/', [RecetController::class, 'index'])->name('recet.index');;
//Route::get('/salam/{count}/{age}', function (Request $request){
//    return view('salam',['count' => $request->count]);
//});
