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

    <div class="register-container p-4 shadow-lg"> <!-- Registration container. -->
        <h2 class="text-center">Register</h2> <!-- Registration title. -->

        <!-- Laravel Form -->
        <form method="POST" action="{{ route('registration.save') }}"> <!-- Registration form. -->
            @csrf <!-- CSRF token. -->

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror"
                    placeholder="First Name" value="{{ old('firstname') }}"> <!-- First name input. -->
                @error('firstname') <!-- Check first name error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror"
                    placeholder="Last Name" value="{{ old('lastname') }}"> <!-- Last name input. -->
                @error('lastname') <!-- Check last name error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <select name="sex" class="form-control @error('sex') is-invalid @enderror"> <!-- Sex selection. -->
                    <option value="" disabled selected>Sex</option> <!-- Default option. -->
                    <option value="Male" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option> <!-- Male option. -->
                    <option value="Female" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                    <!-- Female option. -->
                </select>
                @error('sex') <!-- Check sex error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="date" name="birthday" class="form-control @error('birthday') is-invalid @enderror"
                    value="{{ old('birthday') }}"> <!-- Birthday input. -->
                @error('birthday') <!-- Check birthday error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    placeholder="Username" value="{{ old('username') }}"> <!-- Username input. -->
                @error('username') <!-- Check username error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}"> <!-- Email input. -->
                @error('email') <!-- Check email error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password"> <!-- Password input. -->
                @error('password') <!-- Check password error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="mb-3"> <!-- Margin bottom. -->
                <input type="password" name="confirm-password"
                    class="form-control @error('confirm-password') is-invalid @enderror" placeholder="Confirm Password">
                <!-- Confirmation input. -->
                @error('confirm-password') <!-- Check confirmation error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <div class="form-check mb-3"> <!-- Checkbox container. -->
                <input type="checkbox" name="agree" class="form-check-input @error('agree') is-invalid @enderror"
                    id="terms"> <!-- Agreement checkbox. -->
                <label class="form-check-label" for="terms"> <!-- Agreement label. -->
                    Do you agree with our <a href="#">Privacy Policy</a> and <a href="#">Terms and Conditions?</a>
                    <!-- Policy links. -->
                </label>
                @error('agree') <!-- Check agreement error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>

            <button type="submit" class="btn w-100">Register</button> <!-- Register button. -->
        </form>

        <div class="text-center mt-3"> <!-- Centered text. -->
            <a href="{{ route('login') }}">Already have an account? Login</a> <!-- Login link. -->
        </div>
    </div>

</body> 

</html>