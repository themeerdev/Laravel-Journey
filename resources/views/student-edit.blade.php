@extends('layouts.app')

@section('content')

<div class="form-card">

    <div class="card-header-custom">

        <h2>
            <i class="bi bi-pencil-square"></i>
            Edit Student
        </h2>

        <p>Update student information</p>

    </div>


    <div class="form-body">

        <form action="{{ route('students.update', $student) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')


            <div class="mb-3">

                <label class="form-label">
                    Full Name
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $student->name }}">

                </div>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Email Address
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-envelope-fill"></i>
                    </span>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $student->email }}">

                </div>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Age
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-calendar-fill"></i>
                    </span>

                    <input type="number"
                           name="age"
                           class="form-control"
                           value="{{ $student->age }}">

                </div>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    City
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-geo-alt-fill"></i>
                    </span>

                    <input type="text"
                           name="city"
                           class="form-control"
                           value="{{ $student->city }}">

                </div>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Course
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-book-fill"></i>
                    </span>

                    <select name="course_id" class="form-select">

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ $student->course_id == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- CURRENT IMAGE --}}

            @if($student->profile_image)

                <div class="mb-3 text-center">

                    <label class="form-label d-block">
                        Current Profile Image
                    </label>

                    <img src="{{ asset('storage/' . $student->profile_image) }}"
                         class="profile-img"
                         style="width:75px;height:75px;"
                         alt="Profile">

                </div>

            @endif


            {{-- NEW IMAGE --}}

            <div class="mb-4">

                <label class="form-label">
                    Change Profile Image
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-image-fill"></i>
                    </span>

                    <input type="file"
                           name="profile_image"
                           class="form-control"
                           accept="image/*">

                </div>

                @error('profile_image')

                    <small class="text-danger">
                        {{ $message }}
                    </small>

                @enderror

            </div>


            <div class="d-flex gap-2">

                <button type="submit" class="main-btn flex-grow-1">

                    <i class="bi bi-check-circle-fill"></i>
                    Update Student

                </button>


                <a href="{{ route('students.index') }}"
                   class="back-btn text-decoration-none">

                    <i class="bi bi-arrow-left"></i>
                    Back

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
