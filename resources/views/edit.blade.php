<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Student</h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $student->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $student->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $student->dob) }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control" id="image">
                @if($student->image)
                    <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" class="mt-2" style="max-width: 100px;">
                @endif
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" class="form-control" id="address" rows="3">{{ old('address', $student->address) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $student->phone) }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Hobbies</label><br>
               
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="hobbies" value="{{ old('hobbies', $student->hobbies) }}">
                    </div>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select" id="gender" required>
                    <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender', $student->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tamil" class="form-label">Tamil Marks</label>
                <input type="number" name="tamil" class="form-control" id="tamil" value="{{ old('tamil', $student->tamil) }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="english" class="form-label">English Marks</label>
                <input type="number" name="english" class="form-control" id="english" value="{{ old('english', $student->english) }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="maths" class="form-label">Maths Marks</label>
                <input type="number" name="maths" class="form-control" id="maths" value="{{ old('maths', $student->maths) }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="science" class="form-label">Science Marks</label>
                <input type="number" name="science" class="form-control" id="science" value="{{ old('science', $student->science) }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="soc_science" class="form-label">Social Science Marks</label>
                <input type="number" name="soc_science" class="form-control" id="soc_science" value="{{ old('soc_science', $student->soc_science) }}" min="0" max="100" required>
            </div>
            <div class="mb-3">
                <label for="total_marks" class="form-label">Total Marks</label>
                <input type="text" name="total_marks" class="form-control" id="total_marks" value="{{ old('total_marks', $student->total_marks) }}" readonly>
            </div>
            <div class="mb-3">
                <label for="percentage" class="form-label">Percentage</label>
                <input type="text" name="percentage" class="form-control" id="percentage" value="{{ old('percentage', $student->percentage) }}" readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="calculateMarks()">Calculate</button>
            <button type="submit" class="btn btn-success">Update</button>
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

