<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body> <!-- Start body. -->

    <div class="container d-flex justify-content-center align-items-center vh-100 bg-light-yellow"> <!-- Centered container. -->
        <div class="login-card p-4 shadow"> <!-- Login card. -->

            <h2 class="text-center fw-bold mb-4" style="color: #f28482;">LOGIN</h2> <!-- Login title. -->

            @if (session('success')) <!-- Check success session. -->
                <div class="alert alert-success text-center"> <!-- Success message alert. -->
                    {{ session('success') }} <!-- Display success message. -->
                </div>
            @endif

            {{-- Error Message --}} <!-- Error message section. -->
            @if(session('error')) <!-- Check error session. -->
                <div class="alert alert-danger text-center"> <!-- Error message alert. -->
                    {{ session('error') }} <!-- Display error message. -->
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}"> <!-- Login form. -->
                @csrf <!-- CSRF token. -->
                
                <div class="input-group mb-3"> <!-- Input group. -->
                    <span class="input-group-text bg-white"><i class="fa fa-user"></i></span> <!-- Username icon. -->
                    <input type="text" name="username" <!-- Username input. -->
                        class="form-control input-rounded @error('username') is-invalid @enderror"
                        placeholder="Username" value="{{ old('username') }}"> <!-- Old username value. -->
                    @error('username') <!-- Check username error. -->
                        <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                    @enderror
                </div>

                <div class="input-group mb-2"> <!-- Password input group. -->
                    <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span> <!-- Password icon. -->
                    <input type="password" id="password" name="password" <!-- Password input. -->
                        class="form-control input-rounded @error('password') is-invalid @enderror"
                        placeholder="Password"> <!-- Password placeholder. -->
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword"> <!-- Toggle password button. -->
                        <i class="fa fa-eye" id="eyeIcon"></i> <!-- Eye icon. -->
                    </button>
                    @error('password') <!-- Check password error. -->
                        <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                    @enderror
                </div>

                <div class="mb-3 text-end"> <!-- Margin bottom. -->
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a> <!-- Forgot password link. -->
                    <a href="{{ route('verify.email.form') }}" class="mx-3">Verify Your Email</a> <!-- Verify email link. -->
                </div>

                <button type="submit" class="btn btn-pink w-100 fw-bold">LOGIN</button> <!-- Submit button. -->
            </form>

            <div class="text-center mt-4"> <!-- Centered text. -->
                <small>Don't have an account? <a href="{{ route('registration') }}" <!-- Register link. -->
                        class="text-primary fw-bold">Register</a></small>
            </div>
        </div>
    </div>

    @if($errors->any()) <!-- Check for any errors. -->
        <div class="mt-3"> <!-- Margin top. -->
            @if ($errors->has('email')) <!-- Check email error. -->
                <div class="alert alert-warning text-center"> <!-- Warning message alert. -->
                    {{ $errors->first('email') }} <!-- Display email error. -->
                </div>
            @else <!-- Other errors. -->
                <div class="alert alert-warning text-danger text-center">{{ $errors->first() }}</div> <!-- Display general error. -->
            @endif
        </div>
    @endif

    <script> <!-- Script section. -->
        document.getElementById('togglePassword').addEventListener('click', function () { <!-- Toggle password visibility. -->
            const passwordInput = document.getElementById('password'); <!-- Get password input. -->
            const eyeIcon = document.getElementById('eyeIcon'); <!-- Get eye icon. -->

            if (passwordInput.type === 'password') { <!-- Check input type. -->
                passwordInput.type = 'text'; <!-- Change to text. -->
                eyeIcon.classList.remove('fa-eye'); <!-- Remove eye icon. -->
                eyeIcon.classList.add('fa-eye-slash'); <!-- Add slash icon. -->
            } else { <!-- Otherwise. -->
                passwordInput.type = 'password'; <!-- Change back to password. -->
                eyeIcon.classList.remove('fa-eye-slash'); <!-- Remove slash icon. -->
                eyeIcon.classList.add('fa-eye'); <!-- Add eye icon. -->
            }
        });
    </script>

</body> <!-- End body. -->

</html>