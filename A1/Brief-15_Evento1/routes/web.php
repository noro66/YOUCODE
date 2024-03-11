<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Organizer\EventController;
use App\Http\Controllers\Organizer\OrganizerController;
use App\Http\Controllers\Participant\BookingController;
use App\Http\Controllers\Participant\ParticipantController;
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
   $events =  \App\Models\Event::with('organizers')->where('status' , '=', 'Approved')->paginate(6);
    return view('home', compact('events'));
})->name('home');

/*=========== Guest ============*/
        Route::get('organizer/register', [AuthController::class, 'registerAsOrganizer'])
            ->name('organizer.register');

        Route::get('participant/register', [AuthController::class, 'registerAsParticipant'])
            ->name('participant.register');

        Route::post('auth/register', [AuthController::class, 'registerSave'])
            ->name('auth.register');


        Route::get('login', [AuthController::class, 'login'])->name('auth.login');

        Route::post('login/action', [AuthController::class, 'loginAction'])->name('login.action');

        Route::get('auth/forget-password', [AuthController::class, 'forgetPassword'])
            ->name('auth.forget_password');

        Route::post('auth/forget-password_submit', [AuthController::class, 'forgetPasswordSubmit'])
            ->name('auth.forget_password_submit');

        Route::get('/auth.reset_password/{token}/{email}', [AuthController::class, 'resetPassword'])
            ->name('auth.reset_password');

        Route::post('auth/reset_password_submit', [AuthController::class, 'resetPasswordSubmit'])
            ->name('auth.reset_password_submit');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');


/*=========== Organizer ============*/
Route::middleware(['auth', 'user-access:organizer'])
    ->group( function (){
        Route::get('organizer/dashboard', [OrganizerController::class, 'dashboard'])
            ->name('organizer.dashboard');
        Route::get('organizer/profile', [OrganizerController::class, 'profile'])
            ->name('organizer.profile');
            Route::resource('event', EventController::class);
});

/*=========== Participant ============*/
Route::middleware(['auth', 'user-access:participant'])
    ->group( function (){
        Route::get('participant/dashboard', [ParticipantController::class, 'dashboard'])
            ->name('participant.dashboard');

        Route::post('event/{event}/booking', [BookingController::class, 'store'])->name('event.booking');
        Route::delete('event/{event}/booking', [BookingController::class, 'destroy'])->name('event.booking');
});

/*=========== Admin ============*/
Route::middleware(['auth', 'user-access:admin'])
    ->group( function (){
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        Route::resource('category', CategoryController::class);
});
