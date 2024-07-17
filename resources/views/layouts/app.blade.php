<!DOCTYPE html>
<html>
<head>
    <title>@yield('page_name', 'Home')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="\">Inicio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">Usuarios</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">Productos</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">Eventos</a>
                  </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">@yield('title','index' )</h1>
        @yield('content')
    </div>
</body>
</html>
