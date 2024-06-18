<?php

// app/Http/Controllers/StudentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Hobby;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    public function create()
    {
        
        return view('student');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'tamil' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'maths' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'soc_science' => 'required|integer|min:0|max:100',
            'hobbies' => 'nullable|array',
            'hobbies.*' => 'exists:hobbies,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $studentData = $request->except(['_token', 'image', 'hobbies']);
        $studentData['total_marks'] = $request->tamil + $request->english + $request->maths + $request->science + $request->soc_science;
        $studentData['percentage'] = ($studentData['total_marks'] / 500) * 100;
        $studentData['grade'] = $this->calculateGrade($studentData['percentage']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images', 'public');
            $studentData['image'] = $imagePath;
        }

        $student = Student::create($studentData);

        return redirect()->route('index')->with('status', 'Student added successfully.');
    }

    private function calculateGrade($percentage)
    {
        if ($percentage >= 80) {
            return 'A';
        } elseif ($percentage >= 60) {
            return 'B';
        } elseif ($percentage >= 40) {
            return 'C';
        } elseif ($percentage >= 35) {
            return 'D';
        } else {
            return 'Fail';
        }
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id); 
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:20',
            'gender' => 'required|in:Male,Female,Other',
            'tamil' => 'required|integer|min:0|max:100',
            'english' => 'required|integer|min:0|max:100',
            'maths' => 'required|integer|min:0|max:100',
            'science' => 'required|integer|min:0|max:100',
            'soc_science' => 'required|integer|min:0|max:100',
            'hobbies' => 'nullable|array',
            'hobbies.*' => 'nullable|exists:hobbies,id',
            'image' => 'nullable|image|max:2048', // 2MB max size for image
        ]);

        $studentData = $request->except(['_token', 'image', 'hobbies']);
        $studentData['total_marks'] = $request->tamil + $request->english + $request->maths + $request->science + $request->soc_science;
        $studentData['percentage'] = ($studentData['total_marks'] / 500) * 100;
        $studentData['grade'] = $this->calculateGrade($studentData['percentage']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images', 'public');
            $studentData['image'] = $imagePath;
        }

        $student->update($studentData);

        return redirect()->route('students.show', $student->id)->with('status', 'Student updated successfully.');
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('show', compact('student'));
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('status', 'Student deleted successfully.');
    }


}
