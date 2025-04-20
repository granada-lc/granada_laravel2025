<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>

    <link rel="stylesheet" href="{{ asset('css/registration_success.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Registration Successful!</h2>

    <!-- Display submitted data in a table -->
    <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $value)   <!-- Loop through each key-value pair in the $data array -->
                @if($key !== '_token')   <!-- Skip displaying the _token field -->
                    <tr>
                        <td>{{ ucwords(str_replace('_', ' ', $key)) }}</td>   <!--Format and display the key as a field name -->
                        <td>{{ $value }}</td>   <!-- Display the corresponding value -->
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
