<!DOCTYPE html>
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
    @include('usernav') 
    <div class="container p-5 mt-5 shadow-lg rounded-5" id="table-list">
        <h2 class="text-center mb-4">Student List</h2>
        <div class="table-responsive-lg">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Image</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Total</th>
                        <th>(%)</th>
                        <th>Grade</th>
                        <th>Result</th>
                       
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
                        <a href="{{ asset('storage/' . $student->image) }}" target="_blank">
        <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="img-thumbnail" style="width: 50px; height: 50px;">
    </a>
                        </td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->hobbies }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->total_marks }}</td>
                        <td>{{ $student->percentage }}%</td>
                        <td>{{ $student->grade }}%</td>
                        <td>
                            @if ($student->percentage >= 35)
                            <span class="badge bg-success">Pass</span>
                            @else
                            <span class="badge bg-danger">Fail</span>
                            @endif
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script> -->
</body>
</html>
