<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link rel="stylesheet" href="{{asset (path: 'css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center">Login</h2>
            
    
            <form method="POST" action="{{ route('login') }}">
          
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" required placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" required placeholder="Password">
                </div>
                <button type="submit" class="btn btn-login w-100">Login</button>
            </form>
            
            <div class="text-center mt-3">
                <a href="{{ route('registration') }}" class="register-link">Register</a>
            </div>
        </div>
    </div>

</body>
</html>
