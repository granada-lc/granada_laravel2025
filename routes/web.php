<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route:: get('/dashboard', function (){
   return view('dashboard');
}) -> name ('dashboard');


Route::get ('/login', function () {
  return view ('login');
}) -> name('login');


Route::post('/login', function (\Illuminate\Http\Request $request){
   $email = 'erven@gmail.com';
   $password = '123';

   if ($request -> email === $email && $request -> password === $password){
    return redirect() -> route ('dashboard');
   } else {
       return back() -> with('error', 'Invalid credentials');

   }

});

Route::get('/registration', function(){
   return view('registration');
}) -> name('registration');

Route::post('/registration', function (\Illuminate\Http\Request $request) {
   $data = $request -> except('password');
   return view ('register_success', compact('data'));

});