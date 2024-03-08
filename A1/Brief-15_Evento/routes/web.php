<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\organizer\OrganizerController;
use App\Http\Controllers\ProfileController;
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
})->name('home');

Route::get('/dash', function () {
    return view('TestDashboard');
})->name('dash');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*================================ Admin ================================*/

Route::middleware(['guestCheck:admin', 'guestCheck:organizer', 'guest'])->group(function () {
    Route::get('admin/login', [AdminController::class, 'login'])
        ->name('admin.login');

    Route::get('admin/forget-password', [AdminController::class, 'forgetPassword'])
        ->name('admin.forget_password');

    Route::post('admin/forget-password_submit', [AdminController::class, 'forgetPasswordSubmit'])
        ->name('admin.forget_password_submit');

    Route::get('admin/reset_password/{token}/{email}', [AdminController::class, 'resetPassword'])
        ->name('admin.reset_password');

    Route::post('admin/reset_password_submit', [AdminController::class, 'resetPasswordSubmit'])
        ->name('admin.reset_password_submit');

    Route::post('admin/login', [AdminController::class, 'loginStore'])
        ->name('admin.login');
});


    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::post('admin/logout', [AdminController::class, 'logoutAdmin'])
        ->name('admin.logout');

    Route::resource('category', CategoryController::class)->middleware('admin');


/*========================= Organizer ================================= */
Route::middleware(['guestCheck:admin', 'guest', 'guestCheck:organizer'])->group(function (){
    Route::get('organizer/login', [OrganizerController::class, 'login'])
        ->name('organizer.login');

    Route::get('organizer/forget-password', [OrganizerController::class, 'forgetPassword'])
        ->name('organizer.forget_password');

    Route::post('organizer/forget-password_submit', [OrganizerController::class, 'forgetPasswordSubmit'])
        ->name('organizer.forget_password_submit');

    Route::get('organizer/reset_password/{token}/{email}', [OrganizerController::class, 'resetPassword'])
        ->name('organizer.reset_password');

    Route::post('organizer/reset_password_submit', [OrganizerController::class, 'resetPasswordSubmit'])
        ->name('organizer.reset_password_submit');

    Route::post('organizer/login', [OrganizerController::class, 'loginStore'])
        ->name('organizer.login');

    Route::get('organizer/register',[OrganizerController::class, 'registerIndex'])->name('organizer.register');
    Route::post('organizer/register',[OrganizerController::class, 'registerStore'])->name('organizer.register.store');
});


Route::middleware('organizer')->group(function (){
    Route::get('organizer/dashboard', [OrganizerController::class, 'dashboard'])
        ->name('organizer.dashboard');

    Route::post('organizer/logout', [OrganizerController::class, 'logoutOrganizer'])
        ->name('organizer.logout');

    Route::get('organizer/profile', [OrganizerController::class, 'profile'])
        ->name('organizer.profile');

    Route::get('organizer/events', [OrganizerController::class, 'events'])
        ->name('organizer.events');

    ;Route::get('organizer/settings', [OrganizerController::class, 'settings'])
        ->name('organizer.settings');
//    Route::resource('event', CategoryController::class);
});

require __DIR__.'/auth.php';
