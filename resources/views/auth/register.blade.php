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

<body style="background: #f7f7f7">
    <div class="w-50 shadow p-4 mt-5 mx-auto bg-white">
        <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required placeholder="Name">
            </div>

            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
            </div>

            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
            </div>

            <div class="text-center mt-3">
                <button class="btn btn-success">Register</button>
            </div>
        </form>
    </div>
</body>
</html>