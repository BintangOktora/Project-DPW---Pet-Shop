<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makanan Anjing - Pet Shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f6f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-navbar {
            background-color: #e4710cff;
        }

        .category-header {
            background: white;
            padding: 20px 0;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb a {
            text-decoration: none;
            color: #6c757d;
        }

        .breadcrumb a:hover {
            color: #e4710cff;
        }

        .card-product {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            background: white;
            overflow: hidden;
        }

        .card-product:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            height: 200px;
            object-fit: contain;
            padding: 20px;
            background-color: #fff;
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 48px;
        }

        .card-price {
            color: #dc3545;
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .old-price {
            color: #6c757d;
            font-size: 0.85rem;
            text-decoration: line-through;
            font-weight: normal;
            margin-left: 6px;
        }

        .btn-detail {
            background-color: #e4710cff;
            color: white;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-detail:hover {
            background-color: #d35400;
            color: white;
        }

        .badge-discount {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">PET SHOP</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/makanan-kucing">MAKANAN KUCING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="/makanan-anjing">MAKANAN ANJING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center text-white">
                    @if(session('user_login'))
                        <span class="me-3 small text-white">
                            Halo, {{ session('user_nama') }}
                        </span>
                        <a href="/profile" class="btn btn-sm btn-outline-light me-2">Profile</a>
                        <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                    @else
                        <a href="/login" class="btn btn-sm btn-light me-2">Login</a>
                        <a href="/register" class="btn btn-sm btn-outline-light">Register</a>
                    @endif
                    <a href="/wishlist" class="text-white ms-3 fs-5"><i class="bi bi-heart"></i></a>
                    <a href="/keranjang" class="text-white ms-3 fs-5"><i class="bi bi-bag"></i></a>
                </div>

            </div>
        </div>
    </nav>

    <!-- header / navbar -->
    <div class="category-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Makanan Anjing</li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold m-0">Katalog Makanan Anjing</h2>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- card produk-produk list makanan anjing -->
    <div class="container mb-5">
        <div class="row">
            @foreach($produk as $item)
                <div class="col-6 col-md-4 col-lg-3 mb-4">
                    <div class="card card-product shadow-sm position-relative">
                        @if($item->stok < 5)
                            <span class="badge-discount">STOK TERBATAS</span>
                        @endif
                        <img src="{{ $item->gambar ?: '/images/Pedigree.png' }}" class="card-img-top"
                            alt="{{ $item->nama_produk }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama_produk }}</h5>
                            <p class="card-price">
                                Rp {{ number_format($item->harga_produk, 0, ',', '.') }}
                            </p>

                            <div class="d-grid gap-2">
                                <a href="/detail/{{ $item->id_produk }}" class="btn btn-detail">Detail</a>

                                <div class="d-flex gap-1">
                                    <form action="/keranjang/add" method="POST" class="flex-grow-1">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                        <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                        <input type="hidden" name="gambar_produk" value="{{ $item->gambar }}">
                                        <input type="hidden" name="harga" value="{{ $item->harga_produk }}">
                                        <input type="hidden" name="jumlah" value="1">
                                        <button type="submit" class="btn btn-sm btn-outline-primary w-100">
                                            <i class="bi bi-cart-plus"></i>
                                        </button>
                                    </form>

                                    <form action="/wishlist/add" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                        <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                        <input type="hidden" name="gambar_produk" value="{{ $item->gambar }}">
                                        <input type="hidden" name="harga" value="{{ $item->harga_produk }}">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-heart"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-center mt-4">
            {{ $produk->links() }}
        </div>
    </div>

    <footer class="text-center py-4 bg-light mt-5">
        <p class="text-muted small m-0">
            &copy; {{ date('Y') }} Pet Shop Indonesia. All Rights Reserved.
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>