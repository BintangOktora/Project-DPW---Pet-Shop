<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist Saya - Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-navbar {
            background-color: #e4710cff;
        }

        /* Wishlist Page Styles */
        .wishlist-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .wishlist-header {
            background: linear-gradient(135deg, #e4710c 0%, #f58529 100%);
            color: white;
            padding: 25px 30px;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .wishlist-header h2 {
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .wishlist-badge {
            background: rgba(255, 255, 255, 0.25);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .wishlist-body {
            background: white;
            padding: 25px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* Empty Wishlist */
        .wishlist-empty {
            text-align: center;
            padding: 60px 20px;
            color: #888;
        }

        .wishlist-empty i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .wishlist-empty h4 {
            color: #666;
            margin-bottom: 10px;
        }

        /* Wishlist Item */
        .wishlist-item {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            gap: 20px;
            align-items: center;
            transition: all 0.3s;
            border: 1px solid #eee;
        }

        .wishlist-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .wishlist-item-img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            background: white;
            flex-shrink: 0;
        }

        .wishlist-item-details {
            flex: 1;
        }

        .wishlist-item-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
        }

        .wishlist-item-price {
            color: #e4710c;
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Buttons */
        .btn-add-cart {
            background-color: #e4710c;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add-cart:hover {
            background-color: #d35400;
            color: white;
            transform: scale(1.02);
        }

        .btn-delete {
            background: #dc3545;
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-delete:hover {
            background: #c82333;
            transform: scale(1.05);
        }

        .btn-back {
            background: transparent;
            border: 2px solid #e4710c;
            color: #e4710c;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #fff5ee;
            color: #e4710c;
        }

        /* Alert Styles */
        .alert-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">PET SHOP</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/makanan-kucing">MAKANAN KUCING</a></li>
                    <li class="nav-item"><a class="nav-link" href="/makanan-anjing">MAKANAN ANJING</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                </ul>
                <div class="d-flex align-items-center">
                    @if(session('user_login'))
                        <a href="/wishlist" class="text-white ms-3 fs-5 me-3"><i class="bi bi-heart-fill"></i></a>
                        <a href="/keranjang" class="text-white ms-3 fs-5 me-3"><i class="bi bi-bag"></i></a>
                        <span class="navbar-text text-white me-3">
                            Halo, {{ session('user_nama') }}
                        </span>
                        <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                    @else
                        <a href="/login" class="btn btn-sm btn-light me-2">Login</a>
                        <a href="/register" class="btn btn-sm btn-outline-light">Register</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="wishlist-container">

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <!-- Wishlist Header -->
            <div class="wishlist-header">
                <h2>
                    <i class="bi bi-heart"></i>
                    Wishlist Saya
                </h2>
                <span class="wishlist-badge">{{ $count }} item</span>
            </div>

            <!-- Wishlist Body -->
            <div class="wishlist-body">
                @if($items->isEmpty())
                    <div class="wishlist-empty">
                        <i class="bi bi-heartbreak"></i>
                        <h4>Wishlist Masih Kosong</h4>
                        <p>Belum ada produk yang kamu simpan.</p>
                        <a href="/" class="btn btn-primary mt-3" style="background-color: #e4710c; border: none;">
                            <i class="bi bi-shop me-2"></i>Cari Produk
                        </a>
                    </div>
                @else
                    @foreach($items as $item)
                        <div class="wishlist-item">
                            <img src="{{ $item->gambar_produk ?: '/images/whiskas.png' }}" alt="{{ $item->nama_produk }}"
                                class="wishlist-item-img">

                            <div class="wishlist-item-details">
                                <div class="wishlist-item-name">{{ $item->nama_produk }}</div>
                                <div class="wishlist-item-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            </div>

                            <!-- Add to Cart Button -->
                            <form action="/keranjang/add" method="POST">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                <input type="hidden" name="gambar_produk" value="{{ $item->gambar_produk }}">
                                <input type="hidden" name="harga" value="{{ $item->harga }}">
                                <input type="hidden" name="jumlah" value="1">
                                <button type="submit" class="btn-add-cart">
                                    <i class="bi bi-cart-plus"></i> + Keranjang
                                </button>
                            </form>

                            <!-- Delete Button -->
                            <form action="/wishlist/hapus/{{ $item->id_wishlist }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-delete"
                                    onclick="return confirm('Hapus produk ini dari wishlist?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach

                    <div class="mt-4 text-center">
                        <a href="/" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Lanjut Belanja
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>