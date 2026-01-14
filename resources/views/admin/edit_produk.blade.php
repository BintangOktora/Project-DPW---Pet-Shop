<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    <style>
        body {
            background: #f5f8fa;
            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            width: 420px;
            margin: 50px auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .box {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-save {
            background: #f2f2f2;
            border: 1px solid #999;
        }

        .btn-back {
            background: red;
            color: white;
            border: none;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Kelola Produk</h2>

        <div class="box">
            <h4>Edit Produk</h4>

            <form action="/admin/produk/{{ $produk->id_produk }}/update" method="POST">
                @csrf

                <label>Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required>

                <label>Kategori</label>
                <select name="kategori">
                    <option value="Kucing" {{ $produk->kategori == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                    <option value="Anjing" {{ $produk->kategori == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                </select>

                <label>Harga (Rp)</label>
                <input type="number" name="harga" value="{{ $produk->harga_produk }}" required>

                <label>Stok</label>
                <input type="number" name="stok" value="{{ $produk->stok }}" required>

                <button type="submit" class="btn-save">UPDATE</button>
            </form>

            <a href="/admin/produk">
                <button class="btn-back">Back</button>
            </a>
        </div>
    </div>

</body>

</html>