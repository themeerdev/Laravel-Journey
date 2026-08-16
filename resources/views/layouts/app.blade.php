<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            margin: 0;
            background: #f3f6f5;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #17212b;
        }

        /* NAVBAR */

        .main-navbar {
            background: #101827;
            height: 62px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.12);
        }

        .navbar-brand {
            font-weight: 700;
            color: white !important;
            font-size: 18px;
        }

        .brand-icon {
            color: #00a878;
            margin-right: 7px;
            font-size: 19px;
        }

        .nav-link {
            color: #ffffff !important;
            font-size: 13px;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #00c98b !important;
        }

        .logout-btn {
            border: none;
            background: #dc3545;
            color: white;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
        }

        .logout-btn:hover {
            background: #bb2d3b;
        }

        /* MAIN AREA */

        .main-wrapper {
            min-height: calc(100vh - 62px);
            padding: 35px 20px;
        }

        /* COMMON CARD */

        .form-card {
            width: 100%;
            max-width: 430px;
            margin: 20px auto;
            background: white;
            border-radius: 13px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.12);
            overflow: hidden;
        }

        .card-header-custom {
            background: #07865f;
            color: white;
            padding: 17px 20px;
            text-align: center;
        }

        .card-header-custom h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
        }

        .card-header-custom p {
            margin: 3px 0 0;
            font-size: 11px;
            opacity: .9;
        }

        .form-body {
            padding: 22px 24px;
        }

        /* FORM */

        .form-label {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .input-group-text {
            background: #07865f;
            color: white;
            border: none;
            min-width: 38px;
            justify-content: center;
        }

        .form-control,
        .form-select {
            font-size: 12px;
            min-height: 37px;
            border-color: #d9dfdd;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #07865f;
            box-shadow: 0 0 0 2px rgba(7,134,95,.12);
        }

        .main-btn {
            background: #07865f;
            border: none;
            color: white;
            font-size: 12px;
            font-weight: 600;
            padding: 9px 16px;
            border-radius: 6px;
        }

        .main-btn:hover {
            background: #056b4c;
            color: white;
        }

        .back-btn {
            background: #6c757d;
            border: none;
            color: white;
            font-size: 12px;
            padding: 9px 16px;
            border-radius: 6px;
        }

        /* DASHBOARD */

        .dashboard-card {
            max-width: 700px;
            margin: 20px auto;
            background: white;
            border-radius: 13px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.10);
            padding: 45px 30px;
            text-align: center;
        }

        .dashboard-card h1 {
            font-size: 28px;
            font-weight: 700;
        }

        .dashboard-card p {
            color: #68747d;
            font-size: 14px;
        }

        /* STUDENT LIST */

        .list-container {
            max-width: 1100px;
            margin: auto;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            color: #101827;
            margin-bottom: 3px;
        }

        .page-subtitle {
            font-size: 13px;
            color: #7b858c;
            margin-bottom: 22px;
        }

        .list-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 7px 25px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .table {
            margin: 0;
            font-size: 12px;
            vertical-align: middle;
        }

        .table thead {
            background: #101827;
            color: white;
        }

        .table thead th {
            padding: 12px 10px;
            border: none;
            font-weight: 600;
        }

        .table tbody td {
            padding: 9px 10px;
        }

        .table tbody tr:hover {
            background: #f5faf8;
        }

        .profile-img {
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #07865f;
        }

        .no-image {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e8f3ef;
            color: #07865f;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .edit-btn {
            background: #ffc107;
            color: #212529;
            border: none;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 9px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: 600;
        }

        .search-box {
            max-width: 100%;
        }

        .search-btn {
            background: #07865f;
            color: white;
            border: none;
            font-size: 12px;
            font-weight: 600;
        }

        .search-btn:hover {
            background: #056b4c;
            color: white;
        }

        .add-btn {
            background: #07865f;
            color: white;
            border: none;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 14px;
            border-radius: 6px;
        }

        .add-btn:hover {
            background: #056b4c;
            color: white;
        }

        @media(max-width: 768px) {

            .main-navbar {
                height: auto;
            }

            .navbar-nav {
                padding: 10px 0;
            }

            .page-title {
                font-size: 22px;
            }

            .table {
                min-width: 800px;
            }
        }

    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg main-navbar">

    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-mortarboard-fill brand-icon"></i>
            Student Management
        </a>

        <button class="navbar-toggler bg-light"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainMenu">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="mainMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-grid-1x2-fill"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.create') }}">
                            <i class="bi bi-person-plus-fill"></i>
                            Add Student
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            <i class="bi bi-people-fill"></i>
                            Student List
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf

                            <button type="submit" class="logout-btn">
                                <i class="bi bi-box-arrow-right"></i>
                                Logout
                            </button>

                        </form>

                    </li>

                @endauth

            </ul>

        </div>

    </div>

</nav>


<div class="main-wrapper">

    @yield('content')

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
