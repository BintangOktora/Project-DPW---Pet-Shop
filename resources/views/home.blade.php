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
            /* CATATAN LARAVEL: 
               Pastikan gambar ada di folder 'public/images/kucing.jpg'.
               Browser tidak bisa mengakses folder '/resources' secara langsung.
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

        /* overlay agar tulisan terbaca */
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
        
        /* Tambahan agar gambar card rapi */
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

    <div class="container my-5">
        <h2 class="mb-4">PRODUK TERBARU</h2>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/whiskas.png' class="card-img-top" alt="Makanan Kucing">
                    <div class="card-body text-center">
                        <h5 class="card-title">Whiskas Ocean Fish Canned 400gr</h5>
                        <p class="card-text text-danger fw-bold">Rp 50.000</p>
                        <a href="/detail" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/anjing.png' class="card-img-top" alt="Makanan Anjing">
                    <div class="card-body text-center">
                        <h5 class="card-title">MR.VET D1 Holistic Lamb Dog Food 1.4KG</h5>
                        <p class="card-text text-danger fw-bold">Rp 75.000</p>
                        <a href="/detail" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/pearl.png' class="card-img-top" alt="Snack Hewan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pearl Nutro Multivitamin Kucing 120g</h5>
                        <p class="card-text text-danger fw-bold">Rp 120.000</p>
                        <a href="#" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/shampoo.png' class="card-img-top" alt="Mainan Kucing">
                    <div class="card-body text-center">
                        <h5 class="card-title">ORGO Cat Shampoo 1L 2 in 1 - Shampoo</h5>
                        <p class="card-text text-danger fw-bold">Rp 35.000</p>
                        <a href="#" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/baju.png' class="card-img-top" alt="Kalung Hewan">
                    <div class="card-body text-center">
                        <h5 class="card-title">Set Baju Santa & Topi – Kostum Natal Nyaman untuk Kucing & Anjing</h5>
                        <p class="card-text text-danger fw-bold">Rp 45.000</p>
                        <a href="#" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src='/images/parfum.png' class="card-img-top" alt="Shampoo">
                    <div class="card-body text-center">
                        <h5 class="card-title">ORGO Pet Perfume 250ml Strawflower - Parfum Hewan Wangi</h5>
                        <p class="card-text text-danger fw-bold">Rp 60.000</p>
                        <a href="#" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
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