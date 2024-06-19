<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Student List</title>
</head>
<body>
    <div class="container p-5 mt-5 shadow-lg rounded-5" id="table-list">
        <h2 class="text-center mb-4">Student List</h2>
        <div class="table-responsive-lg">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Image</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Total Marks</th>
                        <th>Percentage</th>
                        <th>Result</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $student->file_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $student->file_path) }}" alt="File" class="img-thumbnail" style="width: 50px; height: 50px;">
                            </a>
                        </td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->hobbies }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->total_marks }}</td>
                        <td>{{ $student->percentage }}%</td>
                        <td>
                            @if ($student->percentage >= 35)
                            <span class="badge bg-success">Pass</span>
                            @else
                            <span class="badge bg-danger">Fail</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $student->id }}" data-bs-placement="top" title="Delete">
                                <i class="bi bi-trash-fill"></i>
                            </button>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal-{{ $student->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $student->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $student->id }}">Delete Student</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this student?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Delete Modal -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
            <a href="{{ route('student') }}" class="btn btn-primary btn-lg mt-3">Create Student</a>
        </div>
        </div>
    </div>
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
</body>
</html>
