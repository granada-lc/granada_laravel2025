<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card p-4 shadow-lg">
            
            <!-- Display the authenticated user -->
            <h2 class="text-center text-primary">Welcome, {{ session('user')->first_name ?? 'User' }} !</h2>

            <h3> 🏷️ Dashboard</h3>
            <div class="d-flex flex-row justify-content-between mt-4">
                <p>This is your main dashboard where you can manage your profile, upload files, and access other features.</p>
          
                <!-- Sidebar for buttons on the left -->
                <div class="button-sidebar d-flex flex-column gap-3">
                    <a href="{{ route('profile.edit') }}" class="btn btn-edit">Edit Profile</a>
                    <a href="{{ url('/upload-files') }}" class="btn btn-upload">Upload Files</a> 
                    <a href="{{ route('password.edit') }}" class="btn btn-edit">Edit Password</a>
                    <a href="{{ route ('user.list') }}" class="btn btn-users">Users (Admin Only)</a>
                    
                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                      <button type="submit" class="btn btn-logout">Logout</button>
                   </form>
                </div>

                <!-- Content Area (Optional) -->
                <div class="content-area">
                    <!-- Add any other content here if needed -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>
