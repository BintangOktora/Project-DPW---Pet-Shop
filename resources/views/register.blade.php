<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Pet Shop</title>
    <style>
        /* --- Reset & Global --- */
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            color: #31353B;
        }

        /* --- Header Logo --- */
        .header-logo {
            padding: 30px 0;
            text-align: center;
        }

        .header-logo a {
            font-size: 30px;
            font-weight: 800;
            color: #e67e22;
            /* Warna Oranye Pet Shop */
            text-decoration: none;
            letter-spacing: -1px;
        }

        /* --- Layout Container --- */
        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            min-height: 70vh;
        }

        /* Sisi Kiri: Ilustrasi */
        .illustration-side {
            flex: 1;
            text-align: center;
            padding-right: 40px;
        }

        .illustration-side img {
            width: 100%;
            max-width: 400px;
            height: auto;
        }

        .illustration-side h2 {
            font-size: 24px;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        .illustration-side p {
            font-size: 15px;
            color: #6D7588;
        }

        /* Sisi Kanan: Card Register */
        .form-side {
            width: 400px;
            padding: 32px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background: #ffffff;
        }

        .form-title {
            text-align: center;
            margin-bottom: 24px;
        }

        .form-title h3 {
            font-size: 22px;
            margin: 0 0 8px 0;
        }

        .form-title p {
            font-size: 14px;
            color: #6D7588;
        }

        .form-title a {
            color: #e67e22;
            text-decoration: none;
            font-weight: bold;
        }

        /* --- Form Elements --- */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #6D7588;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #E5E7E9;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #e67e22;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #e67e22;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }

        button[type="submit"]:hover {
            background-color: #d35400;
        }

        /* --- Alert Styles --- */
        .success {
            background: #ebffef;
            color: #219653;
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 8px;
            font-size: 13px;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #fff5f5;
            color: #eb5757;
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 8px;
            font-size: 13px;
            border: 1px solid #f5c6cb;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #6D7588;
            margin-top: 20px;
            line-height: 1.5;
        }

        .footer-text a {
            color: #e67e22;
            text-decoration: none;
        }

        /* Responsive */
        @media (max-width: 800px) {
            .illustration-side {
                display: none;
            }

            .main-wrapper {
                min-height: auto;
            }
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

    <header class="header-logo">
        <a href="/">PET SHOP</a>
    </header>

    <div class="main-wrapper">

        <div class="illustration-side">
            <img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kage/65610813.png"
                alt="Pet Shop Illustration">
            <h2>Jual Beli Mudah Hanya di Pet Shop</h2>
            <p>Gabung dan rasakan kemudahan merawat hewan piaraanmu.</p>
        </div>

        <div class="form-side">
            <div class="form-title">
                <h3>Daftar Sekarang</h3>
                <p>Sudah punya akun? <a href="/login">Masuk di sini</a></p>
            </div>

            {{-- --- LOGIC BLADE (TETAP DIJAGA) --- --}}

            @if(session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/register" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_user">Nama Lengkap</label>
                    <input type="text" id="nama_user" name="nama_user" placeholder="Contoh: Budi Santoso" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" id="email" name="email" placeholder="nama@email.com" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP / WhatsApp</label>
                    <input type="text" id="no_hp" name="no_hp" placeholder="0812xxxxxxx" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div style="position: relative;">
                        <input type="password" id="password" name="password" placeholder="Masukkan password" required
                            style="padding-right: 40px;">
                        <span onclick="togglePasswordVisibility()"
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); cursor: pointer; color: #6D7588;">
                            <i class="bi bi-eye" id="togglePasswordIcon"></i>
                        </span>
                    </div>
                </div>

                <button type="submit">Daftar</button>

                <div class="footer-text">
                    Dengan mendaftar, saya menyetujui <br>
                    <a href="#">Syarat & Ketentuan</a> serta <a href="#">Kebijakan Privasi</a>.
                </div>
            </form>
        </div>
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