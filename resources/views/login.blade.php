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

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100 bg-light-yellow">
        <div class="login-card p-4 shadow">

            <h2 class="text-center fw-bold mb-4" style="color: #f28482;">LOGIN</h2>

            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Error Message --}}
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="input-group mb-3">
                    <span class="input-group-text bg-white"><i class="fa fa-user"></i></span>
                    <input type="text" name="username"
                        class="form-control input-rounded @error('username') is-invalid @enderror"
                        placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text bg-white"><i class="fa fa-lock"></i></span>
                    <input type="password" id="password" name="password"
                        class="form-control input-rounded @error('password') is-invalid @enderror"
                        placeholder="Password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 text-end">
                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot Password?</a>
                    <a href="{{ route('verify.email.form') }}" class="mx-3">Verify Your Email</a>
                </div>

                <button type="submit" class="btn btn-pink w-100 fw-bold">LOGIN</button>
            </form>

            <div class="text-center mt-4">
                <small>Don't have an account? <a href="{{ route('registration') }}"
                        class="text-primary fw-bold">Register</a></small>
            </div>
        </div>
    </div>

    @if($errors->any())
        <div class="mt-3">
            @if ($errors->has('email'))
                <div class="alert alert-warning text-center">
                    {{ $errors->first('email') }}
                </div>
            @else
                <div class="alert alert-warning text-danger text-center">{{ $errors->first() }}</div>
            @endif
        </div>
    @endif

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>

</body>

</html>