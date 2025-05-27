<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5"> <!-- Success message container. -->
        <div class="alert alert-success text-center"> <!-- Success alert box. -->
            <h4 class="mb-3">Registration Successful!</h4> <!-- Success message header. -->
            <p><strong>Username:</strong> {{ $user->username }}</p> <!-- Display username. -->
            <p><strong>Full Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
            <!-- Display full name. -->
            <p>Please check your email to verify your account before logging in.</p> <!-- Verification prompt. -->
            <a href="{{ route('login') }}" class="btn btn-primary mt-3">Go to Login</a> <!-- Login button. -->
        </div>
    </div>

</body>

</html>