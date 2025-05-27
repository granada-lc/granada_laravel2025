<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
use App\Notifications\ResetForgottenPasswordNotification;


class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        // Return the reset password view with the token
        return view('reset-password', ['token' => $token]);
    }

    public function reset(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email|exists:usersinfo,email',    // Ensure email is required, valid, and exists
            'password' => 'required|min:8|confirmed',    // Ensure password is required, at least 8 characters, and confirmed
            'token' => 'required'    // Ensure token is required
        ]);
        
        // Retrieve the password reset record from the database
        $reset = DB::table('password_resets')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();
        
        // Check if the reset token is valid
        if (!$reset) {
            return back()->withErrors(['email' => 'Invalid or expired reset token.']);
        }
        
        // Retrieve the user by email
        $user = Usersinfo::where('email', $request->email)->first();
        $user->password = Hash::make($request->password); // Hash and set the new password
        $user->save();   // Save the updated user information

        // Send notification
        $user->notify(new ResetForgottenPasswordNotification());
        
        // Delete the password reset record from the database
        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Your password has been reset successfully!');
    }
}