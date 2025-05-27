<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use App\Models\Usersinfo; 
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel; 
use App\Models\Upload;
use Carbon\Carbon; 

class UserController extends Controller 
{
    // Method to list users with optional filtering
    public function index(Request $request)
    {
        $currentUser = session('user'); // Retrieve the current user from the session
        // Check if the user is logged in and is an Admin
        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied'); // Abort with a 403 error if access is denied
        }

        $query = Usersinfo::query(); // Create a query builder for the Usersinfo model

        // Filter by name if provided
        if ($request->filled('name')) {
            $query->where(function ($q) use ($request) {
                // Search for first or last name matching the input
                $q->where('first_name', 'like', "%{$request->name}%")
                    ->orWhere('last_name', 'like', "%{$request->name}%");
            });
        }

        // Filter by email if provided
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%"); // Search for email matching the input
        }

        $users = $query->paginate(10)->withQueryString(); // Paginate results and retain query string

        return view('user-list', compact('users')); // Return the user list view with users data
    }

    // Method to delete a user by ID
    public function destroy($id)
    {
        $currentUser = session('user'); // Retrieve the current user from the session

        // Only allow admin to delete users
        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied'); // Abort with a 403 error if access is denied
        }

        // Don't allow deleting yourself
        if ($currentUser->id == $id) {
            return back()->withErrors(['delete' => 'You cannot delete your own account.']); // Return error if trying to delete own account
        }

        $user = Usersinfo::find($id); // Find the user by ID

        if ($user) {
            $user->delete(); // Delete the user if found
            return back()->with('success', 'User deleted successfully.'); // Return success message
        }

        return back()->withErrors(['delete' => 'User not found.']); // Return error if user not found
    }

    // Method to export user data to CSV
    public function export(Request $request)
    {
        $currentUser = session('user'); // Retrieve the current user from the session

        // Only allow admin to export user data
        if (!$currentUser || $currentUser->user_type !== 'Admin') {
            abort(403, 'Access denied'); // Abort with a 403 error if access is denied
        }

        return Excel::download(new UsersExport($request), 'users.csv'); // Download the user data as a CSV file
    }
}