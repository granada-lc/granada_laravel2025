<?php

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\AuthController;
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