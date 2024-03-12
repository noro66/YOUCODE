<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
/*=========== Guest ============*/
        Route::get('register', [AuthController::class, 'register'])
            ->name('register');


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
        Route::put('booking/{booking}/approve', [BookingController::class, 'approve'])->name('booking.approve');

});

Route::resource('event', EventController::class);

/*=========== Participant ============*/
Route::middleware(['auth', 'user-access:participant'])
    ->group( function (){
        Route::get('participant/dashboard', [ParticipantController::class, 'dashboard'])
            ->name('participant.dashboard');

        Route::get('participant/profile', [ParticipantController::class, 'profile'])
            ->name('participant.profile');

        Route::post('event/{event}/booking', [BookingController::class, 'store'])->name('event.booking');
        Route::delete('event/{event}/booking', [BookingController::class, 'destroy'])->name('event.booking');
        Route::get('bookings', [BookingController::class, 'index'])->name('booking.index');
});

/*=========== Admin ============*/
Route::middleware(['auth', 'user-access:admin'])
    ->group( function (){
        Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');
        Route::get('admin/events', [AdminController::class, 'events'])->name('admin.events');
        Route::post('admin/{event}/events', [AdminController::class, 'approve'])->name('event.approve');

        Route::post('admin/{user}/users', [AdminController::class, 'restrict'])->name('user.restrict');

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

        Route::resource('category', CategoryController::class);
});
