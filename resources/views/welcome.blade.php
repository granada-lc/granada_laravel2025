<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Elect 3 Web Systems Technology - Finals Project</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffe6f0 0%, #ff6f92 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Arial, sans-serif;
            color: #4a1f2d;
        }

        .landing-container {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(255, 111, 146, 0.2);
            padding: 40px 30px;
            text-align: center;
        }

        .landing-title {
            color: #d5006d;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .landing-desc {
            color: #d81b60;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .landing-btn {
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.8rem 2rem;
            margin: 0.5rem;
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
        }

        .landing-btn-primary {
            background: #ff6f92;
            color: #fff;
            border: none;
        }

        .landing-btn-primary:hover {
            background: #d5006d;
            box-shadow: 0 4px 16px rgba(255, 111, 146, 0.3);
        }

        .landing-btn-outline {
            background: #fff;
            color: #ff6f92;
            border: 2px solid #ff6f92;
        }

        .landing-btn-outline:hover {
            background: #ff6f92;
            color: #fff;
        }

        .footer {
            margin-top: 2rem;
            color: #7a2c3e;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="landing-container">
        <div class="landing-title">IT Elect 3 Web Systems Technology</div>
        <div class="landing-desc">
            <strong>Finals Project</strong><br>
            This Laravel web application is a file management and user administration system designed for the IT
            Elective 3 course.
            It features secure authentication, user registration, and file uploads, showcasing skills in building a
            robust and
            user-friendly web application with Laravel and Bootstrap.
        </div>
        <div class="mb-4">
            <a href="{{ route('login') }}" class="btn landing-btn landing-btn-primary">Login</a>
            <a href="{{ route('registration') }}" class="btn landing-btn landing-btn-outline">Register</a>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} IT Elect 3 Web Systems Technology Finals Project
        </div>
    </div>
</body>

</html>