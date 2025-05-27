<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
class AuthController extends Controller
{


    public function login(LoginRequest $request)
    {
        $user = Usersinfo::where('username', $request->username)->first(); // Retrieve the user by username
    
        if ($user && Hash::check($request->password, $user->password)) {  // Check if user exists and password matches
            if (is_null($user->email_verified_at)) {   // Check if the user's email is verified
                return back()->withErrors([
                    'email' => 'Please verify your email before logging in.',
                ])->withInput();   
            }
    
            session(['user' => $user]);  // Store user information in the session
            return redirect()->route('dashboard');
        }
    
        return back()->withErrors([
            'username' => 'Invalid username or password.',
        ]);
    }
    

    public function showLoginForm()
    {
        return view('login');
    }



    public function verifyEmail($token)
    {
        $user = Usersinfo::where('verification_token', $token)->firstOrFail(); //Retrieve the user by the verification token
    
    
        $user->email_verified_at = now();
        $user->verification_token = null; // Clear the verification token
        $user->save();
    
        return redirect()->route('login')->with('success', 'Email verified! You can now log in.');
    }
      public function logout(Request $request)
    {
        $request->session()->flush();  // Clear the session data
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

}