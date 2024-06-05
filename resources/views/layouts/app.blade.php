<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <link rel="stylesheet" href="{{ url('css/style.css') }}">


</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light fs-3 fw-bold" href="#">Laravel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-4 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-light fw-bold" aria-current="page"
                            href="{{route('welcome')}}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold" aria-current="page" href="{{ route('about')}}">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold" aria-current="page"
                            href="{{ route('users.index')}}">users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Link</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>

</body>

</html>