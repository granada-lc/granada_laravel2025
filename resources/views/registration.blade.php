<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="register-container p-4 shadow-lg">
        <h2 class="text-center">Register</h2>

        <!-- Laravel Form -->
        <form method="POST" action="{{ route('registration.submit') }}">
           @csrf

            <div class="mb-3">
                <input type="text" name="first_name" class="form-control" required placeholder="First Name">
            </div>
            <div class="mb-3">
                <input type="text" name="last_name" class="form-control" required placeholder="Last Name">
            </div>
            <div class="mb-3">
                <select name="sex" class="form-control" required>
                    <option value="" disabled selected>Sex</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="date" name="birthday" class="form-control" required>
            </div>

            <div class="mb-3">
                <input type="text" name="username" class="form-control" required placeholder="Username">
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control" required placeholder="Email">
            </div>

            <div class="mb-3">
                <input type="password" name="password" class="form-control" required placeholder="Password">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="agree" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">
                   Do you agree with our <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions?</a>
                </label>
            </div>

            <button type="submit" class="btn w-100">Register</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>
    </div>

</body>
</html>
