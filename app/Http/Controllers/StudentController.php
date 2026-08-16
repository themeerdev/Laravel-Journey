<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $students = $user->students()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->with('course')
            ->paginate(5)
            ->withQueryString();

        // Courses layout ke liye
        $courses = Course::all();

        return view('student-list', compact('students', 'courses'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $courses = Course::all();

        return view('student-form', compact('courses'));
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'age' => 'required|integer|min:18|max:60',
            'city' => 'required',
            'course_id' => 'required',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->students()->create([
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
            'course_id' => $request->course_id,
        ]);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student Registered Successfully');
    }

    /**
     * Display a specific student.
     */
    public function show(Student $student)
    {
        abort_unless($student->user_id === Auth::id(), 403);

        $student->load('course');

        return view('student-show', compact('student'));
    }

    /**
     * Show the form for editing a student.
     */
    public function edit(Student $student)
    {
        abort_unless($student->user_id === Auth::id(), 403);

        $courses = Course::all();

        return view('student-edit', compact('student', 'courses'));
    }

    /**
     * Update a student.
     */
    public function update(Request $request, Student $student)
    {
        abort_unless($student->user_id === Auth::id(), 403);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'age' => 'required|integer',
            'city' => 'required',
            'course_id' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
            'city' => $request->city,
            'course_id' => $request->course_id,
        ];

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')
                ->store('student-images', 'public');
        }

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student Updated Successfully');
    }

    /**
     * Delete a student.
     */
    public function destroy(Student $student)
    {
        abort_unless($student->user_id === Auth::id(), 403);

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student Deleted Successfully');
    }
}
