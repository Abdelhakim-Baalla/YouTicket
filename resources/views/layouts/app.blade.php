<!DOCTYPE html>
<html>
<head>
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/">My App</a>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link">Logout</button>
                </form>
                 <form action="{{ route('profile.index') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-link">Profile</button>
                </form>
            @endauth
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>