<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

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

        .episode-box {
            width: 16%;
            border-radius: 12px;
            overflow: hidden;
            background: #f7f7f7;
            box-shadow: 0px 0px 8px #979797;
            text-decoration: none;
            color: black;
        }

        .episode-box img {
            width: 100%;
            height: 200px;
            border-radius: 12px;
            margin-bottom: 10px;
        }

        .episode-box:hover {
            transition: 0.5s;
            cursor: pointer;
            transform: scale(1.06)
        }
    </style>

    @stack('style')
</head>

<body>
    @include('layouts.navbar')


    @yield('content')

    @stack('script')
</body>
</html>
