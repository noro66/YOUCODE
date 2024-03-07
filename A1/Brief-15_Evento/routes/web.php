<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/* Admin reset password */
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

Route::post('admin/logout', [AdminController::class, 'logoutAdmin'])
    ->name('admin.logout');

Route::middleware('admin')->group(function (){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');
});

require __DIR__.'/auth.php';
