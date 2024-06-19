<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
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
            'hobbies.*' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Calculate total marks and percentage
        $totalMarks = $request->tamil + $request->english + $request->maths + $request->science + $request->soc_science;
        $percentage = ($totalMarks / 500) * 100;

        // Create student record
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->phone = $request->phone;
        $student->gender = $request->gender;
        $student->tamil = $request->tamil;
        $student->english = $request->english;
        $student->maths = $request->maths;
        $student->science = $request->science;
        $student->soc_science = $request->soc_science;
        $student->total_marks = $totalMarks;
        $student->percentage = $percentage;
        $student->hobbies = $request->has('hobbies') ? json_encode($request->hobbies) : null;
        $student->address = $request->address;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('student_images', 'public');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index')->with('status', 'Student added successfully.');
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
            'hobbies.*' => 'nullable|string',
            'image' => 'nullable|image|max:2048', 
        ]);

        $studentData = $request->except(['_token', 'image', 'hobbies']);
        $studentData['total_marks'] = $request->tamil + $request->english + $request->maths + $request->science + $request->soc_science;
        $studentData['percentage'] = ($studentData['total_marks'] / 500) * 100;

        if ($request->has('hobbies')) {
            $studentData['hobbies'] = json_encode($request->hobbies);
        }

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
