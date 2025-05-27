<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body> <!-- Start body. -->

    @include('nav-bar') <!-- Include navigation bar. -->

    @if (session('success')) <!-- Check success session. -->
        <div class="alert alert-success mt-2">{{ session('success') }}</div> <!-- Success message alert. -->
    @endif

    @if ($errors->has('delete')) <!-- Check delete error. -->
        <div class="alert alert-danger mt-2">{{ $errors->first('delete') }}</div> <!-- Display delete error. -->
    @endif

    <div class="container mt-5"> <!-- Main container. -->
        <h2>User List</h2> <!-- User list header. -->
        <div class="card mb-4 shadow-sm"> <!-- Card container. -->
            <div class="card-body"> <!-- Card body. -->
                <form method="GET" action="{{ route('user.list') }}"> <!-- User search form. -->
                    <div class="row g-3 align-items-end"> <!-- Row for inputs. -->
                        <div class="col-md-4"> <!-- Column for name input. -->
                            <label for="searchName" class="form-label">Search by Name</label> <!-- Name label. -->
                            <input type="text" id="searchName" name="name" placeholder="e.g. John"
                                value="{{ request('name') }}" class="form-control"> <!-- Name input. -->
                        </div>
                        <div class="col-md-4"> <!-- Column for email input. -->
                            <label for="searchEmail" class="form-label">Search by Email</label> <!-- Email label. -->
                            <input type="text" id="searchEmail" name="email" placeholder="e.g. john@example.com"
                                value="{{ request('email') }}" class="form-control"> <!-- Email input. -->
                        </div>
                        <div class="col-md-4 d-flex flex-wrap gap-2"> <!-- Column for buttons. -->
                            <button type="submit" class="btn btn-primary">Filter</button> <!-- Filter button. -->
                            @if(request('name') || request('email')) <!-- Check for filters. -->
                                <a href="{{ route('user.list') }}" class="btn btn-outline-secondary">Clear Filters</a>
                                <!-- Clear filters button. -->
                            @endif
                            <div class="col-md-4"> <!-- Column for download button. -->
                                <a href="{{ route('user.export', request()->query()) }}"
                                    class="btn btn-success">Download CSV</a> <!-- Download CSV button. -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded bg-white p-3"> <!-- Table container. -->
            <table class="table table-hover align-middle mb-0 bg-white"> <!-- Table definition. -->
                <thead class="table-primary text-center"> <!-- Table header. -->
                    <tr> <!-- Table row. -->
                        <th>Name</th> <!-- Name header. -->
                        <th>Email</th> <!-- Email header. -->
                        <th>Username</th> <!-- Username header. -->
                        <th>Role</th> <!-- Role header. -->
                        <th>Actions</th> <!-- Actions header. -->
                    </tr>
                </thead>
                <tbody> <!-- Table body. -->
                    @foreach($users as $user) <!-- Loop through users. -->
                        <tr> <!-- User row. -->
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td> <!-- Display full name. -->
                            <td>{{ $user->email }}</td> <!-- Display email. -->
                            <td>{{ $user->username }}</td> <!-- Display username. -->
                            <td>{{ ucfirst($user->user_type) }}</td> <!-- Display user role. -->
                            <td class="text-center"> <!-- Actions cell. -->
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <!-- Delete form. -->
                                    @csrf <!-- CSRF token. -->
                                    @method('DELETE') <!-- DELETE method. -->
                                    <button type="submit" class="btn btn-danger btn-md"> <!-- Delete button. -->
                                        <i class="bi bi-trash"></i> Delete <!-- Delete icon. -->
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4"> <!-- Pagination container. -->
            {{ $users->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- Pagination links. -->
        </div>

</body> <!-- End body. -->

</html>