<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Your Email</title>
    <link rel="stylesheet" href="{{ asset('css/verify-request.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body> 

    <div class="container mt-5"> <!-- Main container. -->
        <a class="btn btn-secondary" href="{{ route('login') }}">Go back</a> <!-- Back to login. -->
        <br><br> <!-- Spacing. -->

        <h3 class="mb-4">Verify Your Email</h3> <!-- Verification title. -->

        @if (session('success')) <!-- Check success session. -->
            <div class="alert alert-success">{{ session('success') }}</div> <!-- Success message alert. -->
        @endif

        @if ($errors->any()) <!-- Check for errors. -->
            <div class="alert alert-danger">{{ $errors->first() }}</div> <!-- Display first error. -->
        @endif

        <form action="{{ route('verify.email.send') }}" method="POST"> <!-- Verification form. -->
            @csrf <!-- CSRF token. -->
            <div class="mb-3"> <!-- Margin bottom. -->
                <label>Email Address</label> <!-- Email label. -->
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"> <!-- Email input. -->
                @error('email') <!-- Check email error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>
            <button class="btn btn-primary">Send Verification Email</button> <!-- Send button. -->
        </form>
    </div>
</body> 

</html>