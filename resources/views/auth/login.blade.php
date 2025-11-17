<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #8792b4ff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .card {
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
        }

        .title {
            font-weight: bold;
            font-size: 28px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <div class="card p-4 shadow-lg">
                    <div class="text-center mb-3">
                        <h3 class="title">THRIFT</h3>
                        <p>Login Sistem</p>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="/login">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <button class="btn btn-light w-100">Login</button>

                        <p class="text-center mt-3">
                            Belum punya akun? <a href="/register" class="text-warning">Register</a>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
