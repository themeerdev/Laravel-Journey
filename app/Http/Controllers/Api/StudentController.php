<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Get all students
    public function index()
    {
        $students = Student::with('course')->get();

        return response()->json([
            'success' => true,
            'students' => StudentResource::collection($students)
        ], 200);
    }

    // Get single student
    public function show($id)
    {
        $student = Student::with('course')->find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'student' => new StudentResource($student)
        ], 200);
    }

    // Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::create($validated);

        $student->load('course');

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully',
            'student' => new StudentResource($student)
        ], 201);
    }

    // Update student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'age' => 'required|integer',
            'city' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student->update($validated);

        $student->load('course');

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully',
            'student' => new StudentResource($student)
        ], 200);
    }

    // Delete student
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'success' => false,
                'message' => 'Student not found'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully'
        ], 200);
    }
}
