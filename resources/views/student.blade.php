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
        body {
            font-family: 'Nunito', sans-serif;
        }
        .form-container {
            background: #f7f7f7;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 600;
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <h2 class="form-header">Add Student</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" class="form-select" id="gender" required>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hobbies" class="form-label">Hobbies</label>
                                <select name="hobbies[]" class="form-select" id="hobbies" multiple>
                                    <option value="Reading" {{ in_array('Reading', old('hobbies', [])) ? 'selected' : '' }}>Reading</option>
                                    <option value="Writing" {{ in_array('Writing', old('hobbies', [])) ? 'selected' : '' }}>Writing</option>
                                    <option value="Sports" {{ in_array('Sports', old('hobbies', [])) ? 'selected' : '' }}>Sports</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tamil" class="form-label">Tamil Marks</label>
                                <input type="number" name="tamil" class="form-control" id="tamil" value="{{ old('tamil') }}" min="0" max="100" required>
                            </div>
                            <div class="col-md-6">
                                <label for="english" class="form-label">English Marks</label>
                                <input type="number" name="english" class="form-control" id="english" value="{{ old('english') }}" min="0" max="100" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="maths" class="form-label">Maths Marks</label>
                                <input type="number" name="maths" class="form-control" id="maths" value="{{ old('maths') }}" min="0" max="100" required>
                            </div>
                            <div class="col-md-6">
                                <label for="science" class="form-label">Science Marks</label>
                                <input type="number" name="science" class="form-control" id="science" value="{{ old('science') }}" min="0" max="100" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="soc_science" class="form-label">Social Science Marks</label>
                                <input type="number" name="soc_science" class="form-control" id="soc_science" value="{{ old('soc_science') }}" min="0" max="100" required>
                            </div>
                            <div class="col-md-6">
                                <label for="total_marks" class="form-label">Total Marks</label>
                                <input type="text" name="total_marks" class="form-control" id="total_marks" value="{{ old('total_marks') }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="percentage" class="form-label">Percentage</label>
                                <input type="text" name="percentage" class="form-control" id="percentage" value="{{ old('percentage') }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Profile Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3">{{ old('address') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary btn-custom" onclick="calculateMarks()">Calculate</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function calculateMarks() {
            let tamil = parseInt(document.getElementById('tamil').value) || 0;
            let english = parseInt(document.getElementById('english').value) || 0;
            let maths = parseInt(document.getElementById('maths').value) || 0;
            let science = parseInt(document.getElementById('science').value) || 0;
            let soc_science = parseInt(document.getElementById('soc_science').value) || 0;

            let total_marks = tamil + english + maths + science + soc_science;
            let percentage = (total_marks / 500) * 100;

            // Update the readonly inputs
            document.getElementById('total_marks').value = total_marks;
            document.getElementById('percentage').value = percentage.toFixed(2);
        }
    </script>
</body>
</html>
