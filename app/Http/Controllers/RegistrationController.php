<?php

namespace App\Http\Controllers;

use App\Models\Usersinfo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function save(Request $request)
    {
        $user = new Usersinfo;
        $user->id = Str::uuid();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->sex = $request->sex;
        $user->birthday = $request->birthday;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Prepare data to pass to the success page
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'sex' => $request->sex,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'username' => $request->username,
            'agree' => $request->agree
        ];
    
        // Redirect and pass data using session (flash)
        return redirect()->route('registration_success')->with('data', $data);
    }
}