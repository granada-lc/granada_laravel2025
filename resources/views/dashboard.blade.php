<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    
@include('nav-bar') <!-- Top nav bar like in the image -->

<div class="d-flex p-4">  
    <div class="content-area">
        <div class="card p-4 shadow-lg">

             <!-- Greeting with user's first name or default 'User'. -->
            <h2 class="text-center text-primary">Welcome, {{ session('user')->first_name ?? 'User' }}!</h2>
            <h3>🏷️ Dashboard</h3>
            <p>This is your main dashboard where you can manage your profile, upload files, and access other features.</p>
        </div>
    </div>
</div>


</body>
</html>
