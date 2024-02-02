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

Route::get('/', [Test::class, 'index']);

Route::get('/salam/{count}/{age}', function (Request $request){
    return view('salam',['count' => $request->count]);
});
