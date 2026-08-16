@extends('layouts.app')

@section('content')

<div class="dashboard-card">

    <div class="mb-3">
        <i class="bi bi-mortarboard-fill"
           style="font-size: 42px; color: #07865f;"></i>
    </div>

    <h1>
        Welcome, {{ Auth::user()->name }} 👋
    </h1>

    <p>
        Welcome to the Student Management System.
        Manage student records easily from your dashboard.
    </p>

    <div class="d-flex justify-content-center gap-3 mt-4 flex-wrap">

        <a href="{{ route('students.create') }}"
           class="main-btn text-decoration-none">

            <i class="bi bi-person-plus-fill"></i>
            Student Registration

        </a>

        <a href="{{ route('students.index') }}"
           class="back-btn text-decoration-none">

            <i class="bi bi-people-fill"></i>
            Student List

        </a>

    </div>

</div>

@endsection
