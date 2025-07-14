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
</head>

<body>
    <div class="p-3 position-sticky" style="background: #ededed;">
        <ul class="d-flex list-unstyled gap-3 align-items-center">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li>
                <form action="" method="get">
                    @csrf

                    <input type="search" name="search" class="form-control" placeholder="Search ...">
                </form>
            </li>

            @foreach ($random_shows as $random_show)
                <li>
                    <a href="">{{ $random_show->title }}</a>
                </li>
            @endforeach

            @auth
                <li class="ms-auto">
                    <a href="{{ route('auth.logout') }}">Logout</a>
                </li>
            @else
                <li class="ms-auto">
                    <div>
                        <a href="{{ route('auth.show-login') }}" class="">Login</a>

                        <a href="{{ route('auth.show-register') }}" class="">Register</a>
                    </div>
                </li>
            @endauth
        </ul>
    </div>

</body>

</html>
