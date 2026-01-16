<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .custom-navbar {
            background-color: #e4710cff;
        }

        .jumbotron {
            /* note: 
               Pastikan gambar ada di folder 'public/images/kucing.jpg'.
            */
            background-image: url('/images/kucing.jpg');
            /* Ganti baris di atas dengan: url('/images/kucing.jpg'); jika file sudah ada di folder public */
            
            background-size: cover;
            background-position: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
            padding: 100px 20px;
            text-align: center;
            margin-top: 0;
            border-radius: 0;
            position: relative;
        }

        /* overlay buat tulisan terbaca*/
        .jumbotron::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .jumbotron h1 {
            position: relative;
            z-index: 1;
            font-weight: bold;
            font-size: 3rem;
        }
        
        /* untuk gambar card rapi */
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">PET SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/makanan-kucing">MAKANAN KUCING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="makanan-anjing">MAKANAN ANJING</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link active" href="/about">About Us</a>
                    </li>
                </ul>

                @if(session('user_login'))
                    <span class="navbar-text text-white me-3">
                        Halo, {{ session('user_nama') }}
                    </span>
                    <a href="/wishlist" class="text-white ms-3 fs-5 me-2"><i class="bi bi-heart"></i></a>
                    <a href="/keranjang" class="text-white ms-3 fs-5 me-2"><i class="bi bi-bag"></i></a>
                    <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                @else

                    <a href="/login" class="btn btn-sm btn-light me-2">Login</a>
                    <a href="/register" class="btn btn-sm btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang di Pet Shop Kami!</h1>
        <p class="lead position-relative" style="z-index: 1;">Sahabat terbaik untuk hewan kesayangan Anda</p>
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

    <div class="container my-5">
        <h2 class="mb-4">PRODUK TERBARU</h2>

    <div class="container my-5">
        <h2 class="mb-4">PRODUK TERBARU</h2>

        <div class="row">
            @foreach($produk as $item)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='{{ $item->gambar ?: "/images/whiskas.png" }}' class="card-img-top" alt="{{ $item->nama_produk }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $item->nama_produk }}</h5>
                        <p class="card-text text-danger fw-bold">Rp {{ number_format($item->harga_produk, 0, ',', '.') }}</p>
                        
                        <div class="d-grid gap-2">
                            <a href="/detail/{{ $item->id_produk }}" class="btn btn-primary w-100">Detail</a>
                            
                            <div class="d-flex gap-1">
                                <form action="/keranjang/add" method="POST" class="flex-grow-1">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                    <input type="hidden" name="gambar_produk" value="{{ $item->gambar }}">
                                    <input type="hidden" name="harga" value="{{ $item->harga_produk }}">
                                    <input type="hidden" name="jumlah" value="1">
                                    <button type="submit" class="btn btn-outline-primary w-100">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </form>

                                <form action="/wishlist/add" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $item->id_produk }}">
                                    <input type="hidden" name="nama_produk" value="{{ $item->nama_produk }}">
                                    <input type="hidden" name="gambar_produk" value="{{ $item->gambar }}">
                                    <input type="hidden" name="harga" value="{{ $item->harga_produk }}">
                                    <button type="submit" class="btn btn-outline-danger">
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
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-center py-4 bg-light mt-5">
        <a href="/admin/login" class="text-muted small text-decoration-none">Admin Panel</a>
        <p class="text-muted small mt-2">&copy; {{ date('Y') }} Pet Shop Indonesia</p>
    </footer>
</body>

</html>