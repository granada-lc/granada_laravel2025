<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 

Route::get('/', function () {
    return view('welcome');
});

// Login View Route
Route::get('/login', function () {
     return view('login');
  })->name('login');

    Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard Route
Route::get('/dashboard', function () {
        return view('dashboard'); 
   })->name('dashboard'); 


/// Show the registration form
Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('registration', [RegistrationController:: class, 'save'])->name('registration.save');

Route::get('/registration_success', function () {
    return view('registration_success');
})->name('registration_success');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');



//Controller for editing name and username
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/edit-profile', [ProfileController::class, 'update'])->name('profile.update');


//Controller for changeing password

Route::get('/edit-password', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/edit-password', [PasswordController::class, 'update'])->name('password.update');

//Controller route for display user
Route::get('/users', [UserController::class, 'index'])->name('user.list');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//Controller for upload view and uploading
Route::middleware([])->group(function () {
    Route::get('/upload', [UploadController::class, 'create'])->name('upload.create');
    Route::post('/upload', [UploadController::class, 'store'])->name('upload.store');
    Route::get('/my-uploads', [UploadController::class, 'index'])->name('upload.index');
    Route::get('/download/{upload}', [UploadController::class, 'download'])->name('upload.download');
    Route::delete('/upload/{upload}', [UploadController::class, 'destroy'])->name('upload.destroy');
});


Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail'])->name('verify.email');

// View to enter email for verification// verification for email
Route::get('/verify-email', [EmailVerificationController::class, 'showVerificationForm'])->name('verify.email.form');
Route::post('/verify-email', [EmailVerificationController::class, 'sendVerificationEmail'])->name('verify.email.send');
Route::get('/verify-email-token/{token}', [EmailVerificationController::class, 'verifyToken'])->name('verify.email.token');



Route::get('/forgot-password', [ForgotPasswordController::class, 'showRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.change');
