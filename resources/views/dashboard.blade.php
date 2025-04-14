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
            <h2 class="text-center text-primary">Welcome, {{ session('user') ?? 'User' }}</h2>

            <div class="d-flex flex-column gap-3 mt-4">
       
             <a href="{{ url('/upload-files') }}" class="btn btn-upload">Upload Files</a> 
             <a href="{{ url('/edit-profile') }}" class="btn btn-edit">Edit Profile</a>
             <a href="{{ url('/users-page') }}" class="btn btn-users">Users (Admin Only)</a>


                <!-- Logout Button -->
                <form action="{{ url ('logout') }}" method="POST">
         
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </div>

   
</body>
</html>
