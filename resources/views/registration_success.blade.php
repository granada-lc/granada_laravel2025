<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Success</title>
    <link rel="stylesheet" href="{{ asset('css/registration_success.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="center-content">
            <h2 class="text-center">Registration Successful!</h2>
            @php
                $data = session('data');
            @endphp

            <table class="table table-bordered table-striped mt-4 text-center">
                <thead class="table-primary">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Sex</th>
                        <th>Email</th>
                        <th>Username</th>
                <!--    <th>Accepted Terms</th>  --> 
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data['first_name'] ?? '' }}</td>
                        <td>{{ $data['last_name'] ?? '' }}</td>
                        <td>{{ $data['birthday'] ?? '' }}</td>
                        <td>{{ $data['sex'] ?? '' }}</td>
                        <td>{{ $data['email'] ?? '' }}</td>
                        <td>{{ $data['username'] ?? '' }}</td>
                    <!-- <td>{{ isset($data['agree']) ? 'Yes' : 'No' }}</td> --> 
                    </tr>
                </tbody>
            </table>

            <a href="{{ route('login') }}" class="btn btn-success mt-3 w-100"> Go to Login</a>
        </div>
    </div>
</body>
</html>
