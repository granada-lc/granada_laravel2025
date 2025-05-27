<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
</head>
<body> <!-- Start body. -->
<div class="reset-card"> <!-- Reset card container. -->
        <h3 class="text-center mb-4">Reset Your Password</h3> <!-- Reset password title. -->

        @if ($errors->any()) <!-- Check for errors. -->
            <div class="alert alert-danger text-center"> <!-- Error alert box. -->
                {{ $errors->first() }} <!-- Display first error. -->
            </div>
        @endif
        

        <form method="POST" action="{{ route('password.change') }}"> <!-- Password reset form. -->
            @csrf <!-- CSRF token. -->
            <input type="hidden" name="token" value="{{ $token }}"> <!-- Hidden token input. -->
        
            <div class="mb-3"> <!-- Margin bottom. -->
                <label for="email" class="form-label">Email Address</label> <!-- Email label. -->
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" > <!-- Email input. -->
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <label for="password" class="form-label">New Password</label> <!-- Password label. -->
                <input type="password" id="password" name="password" class="form-control" > <!-- Password input. -->
                <div id="password-strength" class="mt-1 fw-semibold"></div> <!-- Password strength display. -->
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <label for="password_confirmation" class="form-label">Confirm New Password</label> <!-- Confirmation label. -->
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" > <!-- Confirmation input. -->
                <div id="password-match" class="mt-1 fw-semibold"></div> <!-- Password match display. -->
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button> <!-- Reset password button. -->
        </form>
    </div>

    
    <script src="{{ asset('js/password-strength.js') }}"></script> <!-- Password strength script. -->
</body> <!-- End body. -->
</html>