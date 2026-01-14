<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pet Shop</title>

    <style>
        /* --- Reset & Global Styles --- */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font yang bersih */
            background: #f5f6f7; /* Latar belakang abu-abu sangat terang */
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* --- Header Navigation (Meniru Gambar) --- */
        .main-header {
            background-color: #e67e22; /* Warna Oranye Khas Pet Shop */
            color: white;
            padding: 15px 10%; /* Padding agar isi tidak terlalu ke pinggir */
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
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
        
        /* Menyembunyikan menu di layar kecil agar fokus ke form */
        @media (max-width: 768px) {
             .header-nav { display: none; }
        }


        /* --- Form Container --- */
        .container {
            width: 100%;
            max-width: 450px; /* Sedikit lebih lebar */
            margin: 60px auto; /* Jarak dari header */
            background: white;
            padding: 35px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08); /* Bayangan lebih halus */
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #2c3e50;
            font-size: 28px;
        }

        /* --- Form Elements --- */
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
        }

        /* Efek saat input diklik (Fokus) menjadi oranye */
        input:focus {
            outline: none;
            border-color: #e67e22;
        }

        /* --- Tombol Register (Utama) --- */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #e67e22; /* MENGGUNAKAN WARNA ORANYE TEMA */
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button[type="submit"]:hover {
            background: #d35400; /* Oranye sedikit lebih gelap saat di-hover */
        }

        /* --- Footer Links (Kembali & Login) --- */
        .form-footer {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        .form-footer a.back-link {
            color: #7f8c8d;
            text-decoration: none;
            margin-right: 15px;
        }
        
        .form-footer a.back-link:hover {
            text-decoration: underline;
        }

        .login-link {
            color: #e67e22; /* Link login berwarna oranye */
            font-weight: bold;
            text-decoration: none;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }


        /* --- Alerts --- */
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #f5c6cb;
        }
        .error ul {
            margin: 0; padding-left: 20px;
        }
    </style>
</head>

<body>

    <header class="main-header">
        <div class="header-logo">PET SHOP</div>
        <nav class="header-nav">
            <a href="/">HOME</a>
            <a href="#">MAKANAN KUCING</a>
            <a href="#">MAKANAN ANJING</a>
        </nav>
    </header>

    <div class="container">
        <h2>Buat Akun Baru</h2>

        {{-- register sukses --}}
        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        {{-- register error --}}
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

            <div>
                <label for="nama_user">Nama Lengkap</label>
                <input type="text" id="nama_user" name="nama_user" placeholder="Contoh: Budi Santoso" required>
            </div>

            <div>
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" placeholder="nama@email.com" required>
            </div>
            
            <div>
                <label for="no_hp">Nomor HP / WhatsApp</label>
                <input type="text" id="no_hp" name="no_hp" placeholder="0812xxxxxxx" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password yang kuat" required>
            </div>


            <button type="submit">Daftar Sekarang</button>

            <div class="form-footer">
                <a href="/" class="back-link">← Kembali ke Beranda</a>
                <br><br>
                <span>Sudah punya akun? </span>
                <a href="/login" class="login-link">Login di sini!</a>
            </div>

        </form>
    </div>

</body>
</html>