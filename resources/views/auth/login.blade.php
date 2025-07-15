<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background: #f7f7f7;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="w-50 shadow p-4 mx-auto bg-white">
            <h5 class="text-center">Login</h5>

            <form action="{{ route('auth.login') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                </div>

                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                </div>

                <div class="text-center mt-3">
                    <button class="btn btn-success">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
