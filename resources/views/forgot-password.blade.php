<!-- resources/views/forgot-password.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link href="{{ asset('css/forgot-password.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5"> <!-- Main container. -->
        <h3 class="text-center mb-4">Forgot Password</h3> <!-- Header title. -->

        @if (session('success')) <!-- Check success session. -->
            <div class="alert alert-success text-center">{{ session('success') }}</div> <!-- Success message alert. -->
        @endif

        <form method="POST" action="{{ route('password.email') }}"> <!-- Password reset form. -->
            @csrf <!-- CSRF token. -->
            <div class="mb-3"> <!-- Margin bottom. -->
                <label for="email" class="form-label">Enter your email address</label> <!-- Email label. -->
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}"> <!-- Old email value. -->
                @error('email') <!-- Check email error. -->
                    <div class="invalid-feedback d-block">{{ $message }}</div> <!-- Error message display. -->
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Send Reset Link</button> <!-- Submit button. -->
        </form>
    </div>
</body>

</html>