<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Uploaded Files</title>
    <link href="{{ asset('css/my-uploads.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    @include('nav-bar') <!-- Include navigation bar. -->

    <div class="container mt-5"> <!-- Main container. -->
        <div class="d-flex justify-content-between align-items-center mb-4"> <!-- Flex container. -->
            <h2 class="mb-0">My Uploaded Files</h2> <!-- Page header. -->
            <a href="{{ route('upload.create') }}" class="btn btn-primary">Upload Files</a> <!-- Upload button. -->
        </div>

        @if (session('success')) <!-- Check success session. -->
            <div class="alert alert-success">{{ session('success') }}</div> <!-- Success message alert. -->
        @endif

        <div class="filter-card mb-4"> <!-- Filter card. -->
            <form method="GET" action="{{ route('upload.index') }}" class="row gy-2 gx-3 align-items-center">
                <!-- Filter form. -->
                <div class="col-md-4"> <!-- Column for filename input. -->
                    <input type="text" name="filename" class="form-control" placeholder="Search by filename"
                        value="{{ request('filename') }}"> <!-- Filename input. -->
                </div>
                <div class="col-md-4"> <!-- Column for file type select. -->
                    <select name="type" class="form-select"> <!-- File type dropdown. -->
                        <option value="">All File Types</option> <!-- Default option. -->
                        <option value="application/pdf" {{ request('type') == 'application/pdf' ? 'selected' : '' }}>PDF
                        </option> <!-- PDF option. -->
                        <option value="image/png" {{ request('type') == 'image/png' ? 'selected' : '' }}>PNG</option>
                        <!-- PNG option. -->
                        <option value="image/jpeg" {{ request('type') == 'image/jpeg' ? 'selected' : '' }}>JPEG</option>
                        <!-- JPEG option. -->
                        <option value="application/vnd.openxmlformats-officedocument.wordprocessingml.document" {{ request('type') == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ? 'selected' : '' }}>DOCX</option> <!-- DOCX option. -->
                        <option value="text/plain" {{ request('type') == 'text/plain' ? 'selected' : '' }}>TXT</option>
                        <!-- TXT option. -->
                    </select>
                </div>
                <div class="col-md-4"> <!-- Column for filter buttons. -->
                    <div class="d-flex flex-wrap justify-content-md-end justify-content-start gap-2">
                        <!-- Button container. -->
                        <button type="submit" class="btn btn-primary">Filter</button> <!-- Filter button. -->
                        <a href="{{ route('upload.index') }}" class="btn btn-outline-secondary">Clear</a>
                        <!-- Clear button. -->
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive"> <!-- Responsive table container. -->
            <table class="table table-hover table-striped align-middle bg-white"> <!-- Table definition. -->
                <thead class=" table-primary text-center"> <!-- Table header. -->
                    <tr> <!-- Table row. -->
                        <th>Filename</th> <!-- Filename header. -->
                        <th>Type</th> <!-- Type header. -->
                        <th>Uploaded</th> <!-- Uploaded date header. -->
                        <th>Actions</th> <!-- Actions header. -->
                    </tr>
                </thead>
                <tbody> <!-- Table body. -->
                    @forelse ($uploads as $upload) <!-- Loop through uploads. -->
                        <tr> <!-- Table row for upload. -->
                            <td>{{ $upload->original_filename }}</td> <!-- Display filename. -->
                            <td>{{ $upload->type }}</td> <!-- Display file type. -->
                            <td>{{ $upload->created_at->format('Y-m-d H:i') }}</td> <!-- Display upload date. -->
                            <td> <!-- Action buttons. -->
                                <a href="{{ route('upload.download', $upload) }}"
                                    class="btn btn-sm btn-success me-1">Download</a> <!-- Download button. -->
                                <a href="{{ route('upload.edit', $upload) }}" class="btn btn-sm btn-warning me-1">Update</a>
                                <!-- Update button. -->
                                <form action="{{ route('upload.destroy', $upload) }}" method="POST" class="d-inline">
                                    <!-- Delete form. -->
                                    @csrf <!-- CSRF token. -->
                                    @method('DELETE') <!-- DELETE method. -->
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="btn btn-sm btn-danger">Delete</button> <!-- Delete button. -->
                                </form>
                            </td>
                        </tr>
                    @empty <!-- No uploads found. -->
                        <tr> <!-- Empty row. -->
                            <td colspan="4" class="text-center text-muted">No uploaded files found.</td>
                            <!-- No files message. -->
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4"> <!-- Pagination container. -->
            {{ $uploads->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- Pagination links. -->
        </div>

    </div>
</body>

</html>