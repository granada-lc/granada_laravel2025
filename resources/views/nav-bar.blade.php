
<nav class="navbar navbar-expand-lg custom-navbar">

    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto">

                
                <li class="nav-item"><a class="nav-link" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('password.edit') }}">Change Password</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('upload.index') }}">Uploaded Files</a></li>
                @if(session('user') && session('user')->user_type === 'Admin')
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.list') }}">Users</a></li>
                @endif
            </ul>
        </div>
        <div class="d-flex">
            <a class="btn logout-btn" href="{{ route('login') }}">Logout</a>
        </div>
    </div>
</nav>
