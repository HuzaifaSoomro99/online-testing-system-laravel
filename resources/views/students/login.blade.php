<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height:100vh;">

    <div class="card shadow-lg" style="width: 420px;">
        <div class="card-body p-4">

            <h4 class="text-center mb-3 fw-bold">Student Login</h4>

            <form method="POST" action="/stdlogin">
                @csrf

                <div class="mb-3">
                    <label class="form-label">CNIC</label>
                    <input type="text"
                           name="cnic"
                           class="form-control"
                           placeholder="XXXXX-XXXXXXX-X"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Enter password"
                           required>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="d-grid mb-3">
                    <button class="btn btn-primary">
                        Login
                    </button>
                </div>
            </form>

            <div class="text-center">
                <small class="text-muted">
                    Don’t have an account?
                </small>
                <br>
                <a href="{{ route('students.accounts.create') }}" class="fw-semibold">
                    Create New Account
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
