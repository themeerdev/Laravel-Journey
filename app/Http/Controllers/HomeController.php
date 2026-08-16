<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Course;

class HomeController extends Controller
{
    // Multi Page website (Day 05)
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function services()
    {
        return view('services');
    }

    public function gallery()
    {
        return view('gallery');
    }

    // For using insert data create a function (Day 07)
    public function addStudents()
    {
        Student::create([
            'name' => 'Meerab Zahid',
            'email' => 'meerab@gmail.com',
            'age' => '20',
            'city' => 'Wah Cantt',
        ]);

        return "Student Added Successfully";
    }

    // Using for read data (Day 07)
    public function showStudents()
    {
        $students = Student::all();

        return $students;
    }

    // Find any student
    public function findStudents()
    {
        $student = Student::find(1);

        return $student;
    }

    // Student registration form
    public function studentForm()
    {
        $courses = Course::all();

        return view('student-form', compact('courses'));
    }

    // Store student
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:50',
        'email' => 'required|email',
        'age' => 'required|integer|min:18|max:60',
        'city' => 'required',
        'course_id' => 'required',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $imagePath = null;

    if ($request->hasFile('profile_image')) {
        $imagePath = $request->file('profile_image')
            ->store('student-images', 'public');
    }

    $user->students()->create([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'city' => $request->city,
        'course_id' => $request->course_id,
        'profile_image' => $imagePath,
    ]);

    return redirect()
        ->back()
        ->with('success', 'Student Registered Successfully');
}

    // Student Management List
   public function studentList(Request $request)
{
    $search = $request->input('search');

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $students = $user->students()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->paginate(5)
        ->withQueryString();

    return view('student-list', compact('students'));
}

    // Edit student
   public function edit($id)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $student = $user->students()->findOrFail($id);

    $courses = Course::all();

    return view('student-edit', compact('student', 'courses'));
}

    // Update student
  public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'age' => 'required|integer',
        'city' => 'required',
        'course_id' => 'required',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $student = $user->students()->findOrFail($id);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'city' => $request->city,
        'course_id' => $request->course_id,
    ]);

    if ($request->hasFile('profile_image')) {

        $imagePath = $request->file('profile_image')
            ->store('student-images', 'public');

        $student->update([
            'profile_image' => $imagePath,
        ]);
    }

    return redirect()
        ->route('student.list')
        ->with('success', 'Student Updated Successfully');
}

    // Delete student record
   public function delete($id)
{
    /** @var \App\Models\User $user */
    $user = Auth::user();

    $student = $user->students()->findOrFail($id);

    $student->delete();

    return redirect()
        ->route('student.list')
        ->with('success', 'Student Deleted Successfully');
}

    // Admin Dashboard
    public function adminDashboard()
    {
        $totalStudents = Student::count();

        return view('admin.dashboard', compact('totalStudents'));
    }
}
