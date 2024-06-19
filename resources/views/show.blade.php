<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .student-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        /* .container {
            max-width: 800px;
            margin-top: 50px;
        } */
    </style>
</head>

<body>
<div class="container p-5 mt-5 mb-5 shadow-lg rounded-5">
        <h2 class="text-center">Student Details</h2>

        <!-- Profile Image -->
        <div class="text-center mb-4 mt-10">
        <a href="{{ asset('storage/' . $student->image) }}" target="_blank">
        <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="img-thumbnail" style="width: 150px; height: 150px;">
        </a>

        <!-- Student Information -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">

                    <div>{{ $student->name }}</div>
                </div>
                <div class="mb-3">
                   
                    <div>{{ $student->email }}</div>
                </div>
                <div class="mb-3">
                    
                    <div>{{ $student->dob }}</div>
                </div>
                <div class="mb-3">
                    
                    <div>{{ $student->address }}</div>
                </div>
                <div class="mb-3">

                    <div>{{ $student->phone }}</div> 
                </div>
                <div class="mb-3">

                    <div>{{ $student->gender }}</div>
                </div>
                <div class="mb-3">

                    <div>
                        <span class="badge bg-primary">{{ $student->hobbies }}</span>
                    </div>
                </div>
            </div>
        </div>
        </div>

        

        <!-- Marks Table -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table table-bordered mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Tamil</th>
                            <th scope="col">English</th>
                            <th scope="col">Maths</th>
                            <th scope="col">Science</th>
                            <th scope="col">Social Science</th>
                            <th scope="col">Total Marks</th>
                            <th scope="col">Percentage</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $student->tamil }}</td>
                            <td>{{ $student->english }}</td>
                            <td>{{ $student->maths }}</td>
                            <td>{{ $student->science }}</td>
                            <td>{{ $student->soc_science }}</td>
                            <td class="table-info">{{ $student->total_marks }}</td>
                            <td class="table-info">{{ $student->percentage }}%</td>
                            <td class="table-info">{{ $student->grade }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this student?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
