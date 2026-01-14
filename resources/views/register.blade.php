<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #a0a0a0ff;
        }

        .container {
            width: 400px;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #13bc49ff;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .success {
            color: #166534;
            background: #50e58eff;
            color: #166534;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .back-btn {
            display: block;
            width: 20%;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            background: #6b7280;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .back-btn:hover {
            background: #4b5563;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Register</h2>

        {{-- register sukse --}}
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

            <label>Nama</label>
            <input type="text" name="nama_user" placeholder="Masukkan nama atau username" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <label>No. HP</label>
            <input type="text" name="no_hp" placeholder="Masukkan no HP anda" required>

            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email anda" required>

            <button type="submit">Register</button>

            <a href="/" class="back-btn">Kembali</a>

            <label>sudah punya akun?</label>

            <a href="/login" class="btn btn-primary">Login</a> <label> di sini! </label> {{-- buat login user --}}



        </form>
    </div>

</body>

</html>