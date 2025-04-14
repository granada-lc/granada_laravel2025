<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; 

Route::get('/', function () {
    return view('welcome');
});

// Login View Route
Route::get('/login', function () {
     return view('login');
  })->name('login');

// Login Submission Route
Route::post('/login', function (Request $request) {
    $email = 'erven@gmail.com';
    $password = '123';

    if ($request->input('email') === $email && $request->input('password') === $password) {
        return redirect()->route('dashboard');
    } else {
        return back()->with('error', 'Invalid credentials');
    }
        })->name('login');

// Dashboard Route
Route::get('/dashboard', function () {
        return view('dashboard'); 
   })->name('dashboard'); 


/// Show the registration form
Route::get('/registration', function () {
   return view('registration');
})->name('registration');

// Handle submitted data from the form
Route::post('/registration', function (Request $request) {
   // Exclude 'password' and 'agree' from the displayed data
   $data = $request->except(['password', 'agree']);

   return view('registration_success', compact('data'));
})->name('registration.submit');