<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Pet Shop</title>
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

        /* Cart Page Styles */
        .cart-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .cart-header {
            background: linear-gradient(135deg, #e4710c 0%, #f58529 100%);
            color: white;
            padding: 25px 30px;
            border-radius: 15px 15px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-header h2 {
            margin: 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cart-badge {
            background: rgba(255, 255, 255, 0.25);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .cart-body {
            background: white;
            padding: 25px;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* style keranjang kosong */
        .cart-empty {
            text-align: center;
            padding: 60px 20px;
            color: #888;
        }

        .cart-empty i {
            font-size: 80px;
            color: #ddd;
            margin-bottom: 20px;
        }

        .cart-empty h4 {
            color: #666;
            margin-bottom: 10px;
        }

        /* item keranjang*/
        .cart-item {
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

        .cart-item:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transform: translateY(-2px);
        }

        .cart-item-img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
            object-fit: cover;
            background: white;
            flex-shrink: 0;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
        }

        .cart-item-price {
            color: #e4710c;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .cart-item-subtotal {
            color: #666;
            font-size: 0.9rem;
        }

        /* Quantity Controls */
        .qty-control {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .qty-btn {
            width: 36px;
            height: 36px;
            border: 2px solid #e4710c;
            background: white;
            color: #e4710c;
            font-size: 1.2rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .qty-btn:hover {
            background: #e4710c;
            color: white;
        }

        .qty-value {
            width: 50px;
            text-align: center;
            font-weight: 600;
            font-size: 1.1rem;
            color: #333;
        }

        /* tombol Delete */
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

        /* detail keranjang */
        .cart-summary {
            background: #fff5ee;
            border-radius: 12px;
            padding: 25px;
            margin-top: 20px;
            border: 2px dashed #e4710c;
        }

        .cart-summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .cart-summary-total {
            display: flex;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 2px solid #e4710c;
            margin-top: 15px;
        }

        .cart-summary-total span:first-child {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .cart-summary-total .total-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e4710c;
        }

        /* Buttons */
        .btn-checkout {
            width: 100%;
            background: linear-gradient(135deg, #e4710c 0%, #f58529 100%);
            border: none;
            color: white;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(228, 113, 12, 0.4);
            color: white;
        }

        .btn-continue {
            width: 100%;
            background: transparent;
            border: 2px solid #e4710c;
            color: #e4710c;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-continue:hover {
            background: #fff5ee;
            color: #e4710c;
        }

        .btn-clear {
            background: transparent;
            border: 2px solid #dc3545;
            color: #dc3545;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-clear:hover {
            background: #dc3545;
            color: white;
        }

        /* Alert Styles */
        .alert-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
            border-radius: 12px;
        }

        .alert-error {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
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
                    <a class="nav-link" href="/">Home</a>
                    <li class="nav-item"><a class="nav-link" href="/makanan-kucing">MAKANAN KUCING</a></li>
                    <li class="nav-item"><a class="nav-link" href="/makanan-anjing">MAKANAN ANJING</a></li>
                    <a class="nav-link" href="/about">About Us</a>
                </ul>
                @if(session('user_login'))
                    <span class="navbar-text text-white me-3">
                        Halo, {{ session('user_nama') }}
                        <a href="/wishlist" class="text-white ms-3 fs-5 me-3"><i class="bi bi-heart-fill"></i></a>
                    </span>
                    <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                @else
                    <a href="/login" class="btn btn-sm btn-light me-2">Login</a>
                    <a href="/register" class="btn btn-sm btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="cart-container">

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success mb-4">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error mb-4">
                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                </div>
            @endif

            <!-- header keranjang -->
            <div class="cart-header">
                <h2>
                    <i class="bi bi-cart3"></i>
                    Keranjang Belanja
                </h2>
                <span class="cart-badge">{{ $count }} item</span>
            </div>

            <!-- body keranjang -->
            <div class="cart-body">
                @if($items->isEmpty())
                    <!-- keranjang kosong -->
                    <div class="cart-empty">
                        <i class="bi bi-cart-x"></i>
                        <h4>Keranjang Kosong</h4>
                        <p>Yuk mulai belanja dan tambahkan produk favoritmu!</p>
                        <a href="/" class="btn btn-primary mt-3">
                            <i class="bi bi-shop me-2"></i>Mulai Belanja
                        </a>
                    </div>
                @else
                    <!-- item keranjang -->
                    @foreach($items as $item)
                        <div class="cart-item">
                            <img src="{{ $item->gambar_produk ?: '/images/whiskas.png' }}" alt="{{ $item->nama_produk }}"
                                class="cart-item-img">

                            <div class="cart-item-details">
                                <div class="cart-item-name">{{ $item->nama_produk }}</div>
                                <div class="cart-item-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                                <div class="cart-item-subtotal">
                                    Subtotal: Rp {{ number_format($item->harga * $item->jumlah, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- jumlah barang -->
                            <div class="qty-control">
                                <form action="/keranjang/kurang/{{ $item->id_keranjang }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="qty-btn" {{ $item->jumlah <= 1 ? 'disabled' : '' }}>−</button>
                                </form>

                                <span class="qty-value">{{ $item->jumlah }}</span>

                                <form action="/keranjang/tambah/{{ $item->id_keranjang }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    <button type="submit" class="qty-btn">+</button>
                                </form>
                            </div>

                            <!-- Delete Button -->
                            <form action="/keranjang/hapus/{{ $item->id_keranjang }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-delete"
                                    onclick="return confirm('Hapus produk ini dari keranjang?')">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach

                    <!-- detail keranjang -->
                    <div class="cart-summary">
                        <div class="cart-summary-row">
                            <span>Jumlah Item</span>
                            <span>{{ $count }} produk</span>
                        </div>
                        <div class="cart-summary-row">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="cart-summary-total">
                            <span>Total Pembayaran</span>
                            <span class="total-price">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <form action="/keranjang/checkout" method="POST">
                        @csrf
                        <button type="submit" class="btn-checkout">
                            <i class="bi bi-credit-card"></i>
                            Checkout Sekarang
                        </button>
                    </form>

                    <a href="/" class="btn-continue">
                        <i class="bi bi-arrow-left me-2"></i>Lanjut Belanja
                    </a>

                    <div class="text-center mt-3">
                        <form action="/keranjang/clear" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn-clear" onclick="return confirm('Kosongkan semua keranjang?')">
                                <i class="bi bi-trash me-1"></i>Kosongkan Keranjang
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>