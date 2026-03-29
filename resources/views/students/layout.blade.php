<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Testing System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-primary bg-primary shadow">
        <div class="container-fluid">
            <span class="navbar-brand text-white fw-bold">
                Online Testing System
            </span>

            <div class="ms-auto">
                <form action="/stdlogout" method="get">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content Area -->
    <div class="container my-4">
        <div class="card shadow-sm">
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white text-center py-3 border-top">
        <small class="text-muted">© 2025 Online Testing System</small>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
