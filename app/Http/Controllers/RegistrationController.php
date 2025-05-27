<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\Usersinfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerifyEmail;
class RegistrationController extends Controller
{
    //

    public function save(RegisterUserRequest $request)
    {
        $user = new Usersinfo;     // Create a new Usersinfo instance
        $user->id = \Str::uuid();    // Generate a unique UUID for the user ID
        $user->first_name = $request->firstname;    // Set the user's first name
        $user->last_name = $request->lastname;     // Set the user's last name
        $user->sex = $request->sex;    // Set the user's sex
        $user->birthday = $request->birthday;    // Set the user's birthday
        $user->username = $request->username;   // Set the user's username
        $user->email = $request->email;    // Set the user's email
        $user->password = \Hash::make($request->password);    // Hash and set the user's password
        $user->verification_token = \Str::random(64);     // Generate a random verification token
        $user->save();    // Save the user information to the database

        $user->notify(new VerifyEmail($user->verification_token)); // Send email verification notification

        return view('registration_success', ['user' => $user]); // Return success view with user data
    }

    public function verifyEmail($token)
    {
        // Retrieve user by verification token
        $user = Usersinfo::where('verification_token', $token)->firstOrFail();

    $user->email_verified_at = now(); // Set the email verification timestamp to now
    $user->verification_token = null; // Clear the verification token
    $user->save(); // Save the updated user information

        return redirect()->route('login')->with('success', 'Email verified! You can now log in.');
    }


}