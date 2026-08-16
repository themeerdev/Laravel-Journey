@extends('layouts.app')

@section('content')

<style>
    .student-page {
        max-width: 1150px;
        margin: 35px auto;
    }

    .student-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.10);
        border: 1px solid #e5e7eb;
    }

    /* Green heading like your reference */
    .student-header {
        background: #07865f;
        color: white;
        padding: 18px 25px;
        text-align: center;
    }

    .student-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
    }

    .student-header p {
        margin: 5px 0 0;
        font-size: 13px;
        opacity: 0.9;
    }

    .student-body {
        padding: 25px;
    }

    /* Search */
    .search-box {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search-box input {
        height: 44px;
        border: 1px solid #d5d9dd;
        border-radius: 8px;
        padding: 0 15px;
        flex: 1;
        font-size: 14px;
        outline: none;
    }

    .search-box input:focus {
        border-color: #07865f;
        box-shadow: 0 0 0 3px rgba(7, 134, 95, 0.10);
    }

    .search-btn {
        background: #07865f;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0 25px;
        font-weight: 600;
        cursor: pointer;
    }

    .search-btn:hover {
        background: #056f4e;
    }

    /* Table */
    .table-wrapper {
        overflow-x: auto;
    }

    .student-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .student-table thead {
        background: #f1f5f4;
    }

    .student-table th {
        color: #1f2937;
        font-weight: 700;
        padding: 13px 12px;
        text-align: left;
        border-bottom: 2px solid #07865f;
        white-space: nowrap;
    }

    .student-table td {
        padding: 12px;
        border-bottom: 1px solid #e5e7eb;
        vertical-align: middle;
    }

    .student-table tbody tr:hover {
        background: #f8faf9;
    }

    /* Profile image */
    .profile-img {
        width: 58px;
        height: 58px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #07865f;
        display: block;
    }

    .no-image {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        border: 2px dashed #07865f;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        color: #6b7280;
        text-align: center;
    }

    .student-name {
        font-weight: 700;
        color: #111827;
    }

    .course-badge {
        background: #e6f6f0;
        color: #06734f;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }

    /* Buttons */
    .action-buttons {
        display: flex;
        gap: 6px;
        align-items: center;
    }

    .edit-btn {
        background: #fbbf24;
        color: #111827;
        border: none;
        border-radius: 7px;
        padding: 7px 12px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .edit-btn:hover {
        background: #f59e0b;
        color: #111827;
    }

    .delete-btn {
        background: #e63950;
        color: white;
        border: none;
        border-radius: 7px;
        padding: 7px 12px;
        font-size: 13px;
        font-weight: 600;
    }

    .delete-btn:hover {
        background: #c92f43;
    }

    .add-btn {
        display: inline-block;
        background: #07865f;
        color: white;
        text-decoration: none;
        padding: 9px 18px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .add-btn:hover {
        background: #056f4e;
        color: white;
    }

    .empty-row {
        text-align: center;
        padding: 30px !important;
        color: #777;
    }

    /* Pagination */
    .pagination-area {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .student-page {
            margin: 20px 10px;
        }

        .student-body {
            padding: 15px;
        }

        .search-box {
            flex-direction: column;
        }

        .search-btn {
            height: 42px;
        }

        .student-header h2 {
            font-size: 20px;
        }
    }
</style>


<div class="student-page">

    <div class="student-card">

        <!-- Header -->
        <div class="student-header">
            <h2>🎓 Student Management</h2>
            <p>Manage registered students and their information</p>
        </div>


        <div class="student-body">

            <!-- Add Student -->
            <div class="text-end">
                <a href="{{ route('students.create') }}" class="add-btn">
                    + Add Student
                </a>
            </div>


            <!-- Search -->
            <form action="{{ route('students.index') }}" method="GET" class="search-box">

                <input
                    type="text"
                    name="search"
                    placeholder="🔍 Search student by name..."
                    value="{{ request('search') }}"
                >

                <button type="submit" class="search-btn">
                    Search
                </button>

            </form>


            <!-- Table -->
            <div class="table-wrapper">

                <table class="student-table">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>City</th>
                            <th>Course</th>
                            <th>Actions</th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($students as $student)

                            <tr>

                                <!-- ID -->
                                <td>
                                    {{ $loop->iteration }}
                                </td>


                                <!-- Profile -->
                                <td>

                                    @if($student->profile_image)

                                        <img
                                            src="{{ asset('storage/' . $student->profile_image) }}"
                                            class="profile-img"
                                            alt="Profile Image"
                                        >

                                    @else

                                        <div class="no-image">
                                            No Image
                                        </div>

                                    @endif

                                </td>


                                <!-- Name -->
                                <td>
                                    <span class="student-name">
                                        {{ $student->name }}
                                    </span>
                                </td>


                                <!-- Email -->
                                <td>
                                    {{ $student->email }}
                                </td>


                                <!-- Age -->
                                <td>
                                    {{ $student->age }}
                                </td>


                                <!-- City -->
                                <td>
                                    {{ $student->city }}
                                </td>


                                <!-- Course -->
                                <td>

                                    <span class="course-badge">
                                        {{ $student->course?->course_name ?? 'No Course' }}
                                    </span>

                                </td>


                                <!-- Actions -->
                                <td>

                                    <div class="action-buttons">

                                        <a
                                            href="{{ route('students.edit', $student) }}"
                                            class="edit-btn"
                                        >
                                            ✏️ Edit
                                        </a>


                                        <form
                                            action="{{ route('students.destroy', $student) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this student?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-btn"
                                            >
                                                🗑️ Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="empty-row">
                                    No Students Found
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            <!-- Pagination -->
            <div class="pagination-area">
                {{ $students->links() }}
            </div>

        </div>

    </div>

</div>

@endsection
