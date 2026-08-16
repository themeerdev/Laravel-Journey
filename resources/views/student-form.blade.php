@extends('layouts.app')

@section('content')

<div class="form-card">

    <div class="card-header-custom">

        <h2>
            <i class="bi bi-person-plus-fill"></i>
            Student Registration
        </h2>

        <p>Enter student information</p>

    </div>


    <div class="form-body">

        <form action="{{ route('students.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            {{-- NAME --}}

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
                           placeholder="Enter Student Name"
                           value="{{ old('name') }}">

                </div>

                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            {{-- EMAIL --}}

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
                           placeholder="Enter Email Address"
                           value="{{ old('email') }}">

                </div>

                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            {{-- AGE --}}

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
                           placeholder="Enter Age"
                           value="{{ old('age') }}">

                </div>

                @error('age')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            {{-- CITY --}}

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
                           placeholder="Enter City"
                           value="{{ old('city') }}">

                </div>

                @error('city')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            {{-- COURSE --}}

            <div class="mb-3">

                <label class="form-label">
                    Course
                </label>

                <div class="input-group">

                    <span class="input-group-text">
                        <i class="bi bi-book-fill"></i>
                    </span>

                    <select name="course_id" class="form-select">

                        <option value="">
                            Select Course
                        </option>

                        @foreach($courses as $course)

                            <option value="{{ $course->id }}"
                                {{ old('course_id') == $course->id ? 'selected' : '' }}>

                                {{ $course->course_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- IMAGE --}}

            <div class="mb-4">

                <label class="form-label">
                    Profile Image
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
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <button type="submit" class="main-btn w-100">

                <i class="bi bi-check-circle-fill"></i>
                Register Student

            </button>

        </form>

    </div>

</div>

@endsection


















