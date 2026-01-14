<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Pet Shop</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f1f5f9;
        }

        /* HEADER */
        .header {
            padding: 15px 30px;
            border-top: 4px solid #8b0000;
        }

        /* WRAPPER */
        .container {
            max-width: 1100px;
            margin: auto;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* === FORM CENTER === */
        .form-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .admin-box {
            background: white;
            width: 420px;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .admin-box h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 4px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
        }

        button {
            width: 100%;
            margin-top: 10px;
            padding: 10px;
            cursor: pointer;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #ddd;
            padding: 8px;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .back-btn {
            display: block;
            width: 30%;
            text-align: center;
            padding: 10px;
            margin-top: 10px;
            background: #ff0000ff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <strong> ADMIN </strong><br>
    </div>

    <div class="container">

        <h2>Kelola Produk</h2>

        <div class="form-wrapper">
            <div class="admin-box">
                <h4>Tambah Produk Baru</h4>

                <form action="{{ route('admin.produk.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" required>
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori">
                            <option value="Kucing">Kucing</option>
                            <option value="Anjing">Anjing</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga_produk" required>
                    </div>

                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" name="stok" required>
                    </div>

                    <button type="submit">SAVE</button>

                    <a href="/" class="back-btn">Log out</a>

                </form>
            </div>
        </div>

        <!-- TABEL READ PRODUK -->
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>⚙️</th>
            </tr>

            @foreach($produk as $p)
                <tr>
                    <td>{{ $p->id_produk }}</td>
                    <td>{{ $p->nama_produk }}</td>
                    <td>{{ $p->kategori }}</td>
                    <td>{{ $p->harga_produk }}</td>
                    <td>{{ $p->stok }}</td>
                    <td>-</td>
                </tr>
            @endforeach
        </table>

    </div>

</body>

</html>