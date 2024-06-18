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
        <h2>Add Student</h2>
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
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3">{{ old('address') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Hobbies</label><br>
                @foreach($hobbies as $hobby)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobbies[]" id="hobby_{{ $hobby->id }}" value="{{ $hobby->id }}"
                            {{ is_array(old('hobbies')) && in_array($hobby->id, old('hobbies')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="hobby_{{ $hobby->id }}">{{ $hobby->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" id="gender" required>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tamil" class="form-label">Tamil Marks</label>
                <input type="number" name="tamil" class="form-control" id="tamil" value="{{ old('tamil') }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="english" class="form-label">English Marks</label>
                <input type="number" name="english" class="form-control" id="english" value="{{ old('english') }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="maths" class="form-label">Maths Marks</label>
                <input type="number" name="maths" class="form-control" id="maths" value="{{ old('maths') }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="science" class="form-label">Science Marks</label>
                <input type="number" name="science" class="form-control" id="science" value="{{ old('science') }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="soc_science" class="form-label">Social Science Marks</label>
                <input type="number" name="soc_science" class="form-control" id="soc_science" value="{{ old('soc_science') }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="total_marks" class="form-label">Total Marks</label>
                <input type="text" name="total_marks" class="form-control" id="total_marks" value="{{ old('total_marks') }}" readonly>
            </div>
            <div class="mb-3">
                <label for="percentage" class="form-label">Percentage</label>
                <input type="text" name="percentage" class="form-control" id="percentage" value="{{ old('percentage') }}" readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="calculateMarks()">Calculate</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script>
        function calculateMarks() {
            let tamil = parseInt(document.getElementById('tamil').value) || 0;
            let english = parseInt(document.getElementById('english').value) || 0;
            let maths = parseInt(document.getElementById('maths').value) || 0;
            let science = parseInt(document.getElementById('science').value) || 0;
            let soc_science = parseInt(document.getElementById('soc_science').value) || 0;

            let total_marks = tamil + english + maths + science + soc_science;
            let percentage = (total_marks / 500) * 100;

            document.getElementById('total_marks').value = total_marks;
            document.getElementById('percentage').value = percentage.toFixed(2) + '%';
        }
    </script>

</body>

</html>
