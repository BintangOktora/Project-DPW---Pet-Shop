<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Admin - Pet Shop</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .menu a {
            color: white;
            text-decoration: none;
            margin-left: 25px;
            font-size: 14px;
            font-weight: 500;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        /* LOGIN BOX */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 70px);
        }

        .login-box {
            background: white;
            width: 360px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 25px;
            color: #2c3e50;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
        }

        input:focus {
            border-color: #e67e22;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #e67e22;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #d35400;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .back {
            margin-top: 15px;
            font-size: 13px;
        }

        .back a {
            text-decoration: none;
            color: #e67e22;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- FORM login admin -->
    <div class="container">
        <div class="login-box">
            <h2>Admin</h2>

            @if(session('error'))
                <div class="error">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="/admin/login">
                @csrf

                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan username admin" required>

                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>

                <button type="submit">Masuk</button>
            </form>

            <div class="back">
                <a href="/">← Kembali ke Beranda</a>
            </div>
        </div>
    </div>

</body>

</html>