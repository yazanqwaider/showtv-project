<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Dashboard</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <style>
        .navbar-link {
            color: white;
            text-decoration: none;
            font-size: 17px;
            background: #b8b8b8;
            padding: 7px 28px;
            border-radius: 9px;
        }

        .navbar-link:hover {
            color: rgb(58, 58, 58);
        }

        .home-link {
            background: #8a8a8a;
        }
    </style>

    @stack('style')
</head>

<body>
    @include('dashboard.layouts.navbar')

    <div class="p-3">
        @yield('content')
    </div>

    @stack('script')
</body>
</html>
