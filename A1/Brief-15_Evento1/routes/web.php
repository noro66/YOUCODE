<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Organizer\OrganizerController;
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

Route::get('/', function () {
    return view('welcome');
});

/*=========== Guest ============*/
Route::middleware('guest')
    ->group( function (){
        Route::get('organizer/register', [AuthController::class, 'registerAsOrganizer'])
            ->name('organizer.register');
        Route::get('participant/register', [AuthController::class, 'registerAsParticipant'])
            ->name('participant.register');
        Route::get('login', [AuthController::class, 'login'])->name('login');
});

/*=========== Organizer ============*/
Route::middleware('$userAccess:organizer')
    ->group( function (){
        Route::get('organizer/dashboard', [OrganizerController::class, 'dashboard'])
            ->name('organizer.dashboard');
});

/*=========== Participant ============*/
Route::middleware('$userAccess:participant')
    ->group( function (){
        Route::get('participant/dashboard', [AuthController::class, 'dashboard'])
            ->name('participant.dashboard');

});

/*=========== Admin ============*/
Route::middleware('$userAccess:admin')
    ->group( function (){
        Route::get('admin/dashboard', [AuthController::class, 'dashboard'])
            ->name('admin.dashboard');
});
