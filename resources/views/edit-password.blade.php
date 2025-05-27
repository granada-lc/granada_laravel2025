<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
    <link rel="stylesheet" href="{{ asset('css/edit-password.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Include Navbar -->
    @include('nav-bar')

    @if (session('success') || $errors->any()) // Check for error messages.
        <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
            <div id="feedbackToast"
                class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0"
                role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        @if(session('success'))
                            {{ session('success') }} // Success message.
                        @else
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error) // Loop through errors.
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <br>

    <!-- Main Content -->
    <div class="medium-container">
        <h2>Change Password</h2>

        <form action="{{ route('password.update') }}" method="POST">
            <!-- Form for password update with CSRF protection. -->
            @csrf <!-- Generates CSRF token for security. -->

            <!-- Form fields for updating the user's password, including old password, new password, and confirmation, with validation 
             and feedback for errors. -->

            <div class="mb-3">
                <label>Old Password</label>
                <input type="password" name="old_password"
                    class="form-control @error('old_password') is-invalid @enderror">
                @error('old_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="new_password"
                    class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password"
                    class="form-control @error('confirm_password') is-invalid @enderror">
                @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const toastEl = document.getElementById('feedbackToast');
                    if (toastEl) {
                        const toast = new bootstrap.Toast(toastEl, { delay: 3000 });
                        toast.show();
                    }
                });
            </script>

</body>

</html>