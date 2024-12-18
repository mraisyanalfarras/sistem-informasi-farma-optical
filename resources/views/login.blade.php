<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; Inventaris Sekolah</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            margin: 0;
            background: #f4f6f9;
        }

        .login-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .login-left {
            flex: 1;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-right {
            flex: 1;
            background: url('../assets/img/backgrounds/18.jpg') no-repeat center center;
            background-size: cover;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
        }

        .greeting-text {
            position: absolute;
            bottom: 50px;
            left: 30px;
            color: #fff;
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
  top: 20px; /* Jarak dari atas */
  right: 20px; /* Jarak dari kanan */
  z-index: 1000; /* Tombol berada di atas elemen lain */
  display: flex;
  gap: 10px; /* Jarak antar tombol */
}
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Left Section: Login Form -->
        <div class="absolute-top-right p-3" style="position: absolute; z-index: 1000;">
            <a href="" class="btn btn-light" target="_self">About</a>
            <a href="" class="btn btn-light" target="_self">Contact</a>
        </div>
        <div class="login-left">
            <div class="w-100" style="max-width: 400px;">
                <!-- Logo -->
                <div class="text-center mb-4">
                    <img src="../assets/img/backgrounds/kacamata.png" alt="logo" width="150" class="shadow-light rounded-circle mb-5 mt-2">
                    <h4 class="fw-bold text-primary">Login</h4>
                    <p class="text-muted"> Selamat Datang Farma Optical</p>
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
                        Copyright &copy;  | Made with 💙 by Tim Developer
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Section: Background Image & Greetings -->
        <div class="login-right">
            <div class="overlay"></div>
            <div class="greeting-text">
                <h1 class="display-4 fw-bold" id="greetings"></h1>
                <p>Pangkalan Kerinci, Indonesia</p>
            </div>
        </div>
    </div>

    <!-- JS Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Greetings JS -->
    
</body>

</html>