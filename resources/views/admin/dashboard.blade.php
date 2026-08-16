@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h2>Admin Dashboard</h2>

            <p>Total Students Registered: <strong>{{ $totalStudents }}</strong></p>

        </div>
    </div>

</div>

@endsection
