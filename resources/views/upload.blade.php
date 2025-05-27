<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('css/upload.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>

<body> 
    @include('nav-bar') <!-- Include navigation bar. -->

    <div class="container mt-5"> <!-- Main container. -->
        <h2>Upload a File</h2> <!-- Upload title. -->
        @if (session('success')) <!-- Check success session. -->
            <div class="alert alert-success">{{ session('success') }}</div> <!-- Success message alert. -->
        @endif
        <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data"> <!-- Upload form. -->
            @csrf <!-- CSRF token. -->
            <div class="mb-3"> <!-- Margin bottom. -->
                <label for="file" class="form-label">Choose Files</label> <!-- File label. -->
                <input type="file" name="file[]" class="form-control @error('file.*') is-invalid @enderror" multiple
                    required> <!-- File input. -->
                @error('file.*') <!-- Check file error. -->
                    <div class="invalid-feedback">{{ $message }}</div> <!-- Display error message. -->
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Upload</button> <!-- Upload button. -->
        </form>
    </div>
</body> 

</html>