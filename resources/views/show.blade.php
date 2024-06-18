<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="container mt-5">
        <h2>Student Details</h2>
        <div class="mb-3">
            <label class="form-label">Name:</label>
            <div>{{ $student->name }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <div>{{ $student->email }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Date of Birth:</label>
            <div>{{ $student->dob }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Address:</label>
            <div>{{ $student->address }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <div>{{ $student->phone }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Gender:</label>
            <div>{{ $student->gender }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Hobbies:</label>
            <div>
               
                    <span class="badge bg-primary">{{ $student->hobbies }}</span>
                
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamil Marks:</label>
            <div>{{ $student->tamil }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">English Marks:</label>
            <div>{{ $student->english }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Maths Marks:</label>
            <div>{{ $student->maths }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Science Marks:</label>
            <div>{{ $student->science }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Social Science Marks:</label>
            <div>{{ $student->soc_science }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Marks:</label>
            <div>{{ $student->total_marks }}</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Percentage:</label>
            <div>{{ $student->percentage }}%</div>
        </div>
        <div class="mb-3">
            <label class="form-label">Grade:</label>
            <div>{{ $student->grade }}</div>
        </div>
        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
        </form>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>


