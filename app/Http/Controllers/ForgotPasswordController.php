<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    //

    public function showRequestForm()
    {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
         // Validate the request to ensure email is required, valid, and exists
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email',
        ]);

        $token = Str::random(64);  // Generate a random token for password reset
        
        // Insert or update the password reset token in the database
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );
       
         // Retrieve the user by their email address
        $user = Usersinfo::where('email', $request->email)->first();
        
         // Notify the user with the password reset link
        $user->notify(new ResetPasswordNotification($token));

        return back()->with('success', 'We have emailed your password reset link!');
    }
}