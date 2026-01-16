<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pet Shop</title>

    <style>
        /* --- Reset & Global Styles --- */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f6f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* --- Header Navigation --- */
        .main-header {
            background-color: #e67e22;
            /* Warna Oranye Pet Shop */
            color: white;
            padding: 15px 10%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-logo {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .header-nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: 500;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .header-nav {
                display: none;
            }
        }

        /* --- untuk Form Container --- */
        .container {
            width: 100%;
            max-width: 400px;
            margin: 80px auto;
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            position: relative;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 28px;
        }

        /* --- untuk elemen Form (mengatur penempatan) --- */
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #e67e22;
        }

        /* --- Tombol Login --- */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #e67e22;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            background: #d35400;
        }

        /* --- Links (Footer Form) --- */
        .form-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .form-footer a {
            text-decoration: none;
        }

        .register-link {
            color: #e67e22;
            font-weight: bold;
        }

        .register-link:hover {
            text-decoration: underline;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            color: #7f8c8d;
            font-size: 13px;
        }

        .back-link:hover {
            color: #333;
        }

        /* --- Alerts (Error) --- */
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #f5c6cb;
            text-align: center;
            font-size: 14px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <a href="/" class="text-secondary"
            style="position: absolute; top: 15px; left: 15px; text-decoration: none; font-size: 1.2rem;">
            <i class="bi bi-x-lg"></i>
        </a>
        <h2>Login Member</h2>

        {{-- ERROR ALERT --}}
        @if(session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div>
                <label for="username">Nama / Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>

            <div>
                <label for="password">Password</label>
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Password" required
                        style="padding-right: 40px;">
                    <span onclick="togglePasswordVisibility()"
                        style="position: absolute; right: 12px; top: 38%; transform: translateY(-50%); cursor: pointer; color: #6D7588;">
                        <i class="bi bi-eye" id="togglePasswordIcon"></i>
                    </span>
                </div>
            </div>

            <button type="submit">Masuk</button>

            <div class="form-footer">
                <span>Belum punya akun? </span>
                <a href="/register" class="register-link">Daftar sekarang</a>
            </div>

        </form>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>