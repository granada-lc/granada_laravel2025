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
   
   
   <!-- Loop through the submitted data and display each key-value pair -->
<ul class="list-group">
    @foreach($data as $key => $value)
        <li class="list-group-item">
            <strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}
        </li>
    @endforeach
</ul>


</div>
</body>
</html>
