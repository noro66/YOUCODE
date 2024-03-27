<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'],  function () {
    Route::match(['GET','POST'],'login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [AuthController::class, 'profile']);
});

Route::resource('event', EventController::class);
//Route::resource('application', ApplicationController::class);
Route::post('application/{event}/store', [ApplicationController::class, 'store']);
Route::delete('application/{application}/destroy', [ApplicationController::class, 'destroy']);
Route::get('application', [ApplicationController::class, 'index']);
Route::post('application/{application}/acceptation', [ApplicationController::class, 'acceptApplication']);
Route::get('application/{application}/show', [ApplicationController::class, 'show']);

