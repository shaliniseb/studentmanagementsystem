<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <title>Student Management System</title>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark" aria-label="Main navigation">
        <main class="container mt-2">
            <a class="navbar-brand" href="/">Student Management System</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/"> <span class="sr-only">Home</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('addstudent') }}"> <span class="sr-only">Add
                                Student</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('liststudent') }}">View Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('addmark') }}">Add Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('listmarks') }}">View Marks</a>
                    </li>
                </ul>
            </div>
        </main>
    </nav>
