<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usersinfo;
use App\Http\Requests\UpdatePasswordRequest;
use App\Notifications\ChangePasswordNotification;

class PasswordController extends Controller
{
    //

    public function edit()
    {
        return view('edit-password');
    }

    public function update(UpdatePasswordRequest $request)
    { 
        // Retrieve the currently logged-in user by session ID
        $user = Usersinfo::find(session('user')->id);
        
         // Check if user exists and if the old password is correct
        if (!$user || !Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect.']);
        }
        // Hash and set the new password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Notify the user about the password change
        $user->notify(new ChangePasswordNotification());
    
        return back()->with('success', 'Password updated successfully!');
    }
}