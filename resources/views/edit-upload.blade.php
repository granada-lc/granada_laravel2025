<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update File</title>
    <link rel="stylesheet" href="{{ asset('css/edit-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Include Navbar -->
    @include('nav-bar')

    <div class="container">   <!-- Main container. -->
    <div class="row justify-content-center"> <!-- Centered row. -->
        <div class="col-md-8 col-lg-6"> <!-- Responsive column. -->
            <div class="card shadow"> <!-- Card component. -->
                <div class="card-header bg-primary text-white">Update File</div> <!-- Card header. -->
                <div class="card-body"> <!-- Card body. -->
                    <form method="POST" action="{{ route('upload.update', $upload) }}" enctype="multipart/form-data"> <!-- File update form. -->
                        @csrf <!-- CSRF token. -->
                        @method('PUT') <!-- PUT method. -->

                        <div class="mb-3"> <!-- Margin bottom. -->
                            <label class="form-label">Current File:</label> <!-- Current file label. -->
                            <div class="mb-2">{{ $upload->original_filename }}</div> <!-- Display current file. -->
                        </div>

                        <div class="mb-3"> <!-- Margin bottom. -->
                            <label for="file" class="form-label">Choose New File</label> <!-- New file label. -->
                            <input type="file" class="form-control" id="file" name="file" required> <!-- File input. -->
                            @error('file') <!-- Error handling. -->
                                <div class="text-danger small mt-1">{{ $message }}</div> <!-- Display error message. -->
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end"> <!-- Flex container. -->
                            <button type="submit" class="btn btn-primary">Update File</button> <!-- Submit button. -->
                            <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a> <!-- Cancel button. -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script> <!-- Bootstrap script. -->
</body>

</html>