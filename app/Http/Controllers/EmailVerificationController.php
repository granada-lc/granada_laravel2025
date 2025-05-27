<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Usersinfo;
use App\Notifications\EmailVerificationNotification;

class EmailVerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('verify-request');  // Return the view for requesting email verification
    }

    public function sendVerificationEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email',  // Validate the request to ensure email is required, valid, and exists
        ]);


        // Retrieve the user by their email address
        $user = Usersinfo::where('email', $request->email)->first();

        if ($user->email_verified_at) {
            return back()->with('success', 'Your email is already verified.');
        }

        $user->verification_token = Str::random(60);   // Generate a new verification token
        $user->save();
        
        // Send the verification email notification
        $user->notify(new EmailVerificationNotification($user->verification_token));

        return back()->with('success', 'Verification email sent! Please check your inbox.');
    }

    public function verifyToken($token)
    {    
        // Retrieve the user by the verification token
        $user = Usersinfo::where('verification_token', $token)->firstOrFail();

        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Email verified successfully!');
    }
}