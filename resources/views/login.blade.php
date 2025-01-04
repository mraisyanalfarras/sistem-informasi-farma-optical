<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Farma Optical</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            margin: 0;
            background: url('../assets/img/backgrounds/IMG20241217173227.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .login-card {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6dd5ed;
        }

        .btn-primary {
            background-color: #6dd5ed;
            border: none;
        }

        .btn-primary:hover {
            background-color: #5bb8d8;
        }

        .absolute-top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    {{-- <div class="absolute-top-right p-3">
        <a href="" class="btn btn-light" target="_self">About</a>
        <a href="" class="btn btn-light" target="_self">Contact</a>
    </div> --}}

    <div class="login-container">
        <div class="login-card">
            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="../assets/img/backgrounds/kacamata.png" alt="logo" width="150" class="shadow-light rounded-circle mb-5 mt-2">
                <h4 class="fw-bold text-primary">Login</h4>
                <p class="text-muted">Selamat Datang Farma Optical</p>
                <p class="text-muted">Silakan masuk ke akun Anda</p>
            </div>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password Anda" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted small">
                    Copyright &copy; | Made with 💙 by Tim Developer
                </p>
            </div>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>