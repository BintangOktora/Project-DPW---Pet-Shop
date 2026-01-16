<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makanan Kucing - Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* --- Tema Global --- */
        body {
            background-color: #f5f6f7;
            /* Abu-abu sangat terang */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-navbar {
            background-color: #e4710cff;
            /* Oranye Petshop */
        }

        /* --- Header Kategori --- */
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

        /* --- Card Produk --- */
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
            /* Agar gambar tidak terpotong */
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
            /* Membatasi judul max 2 baris */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 48px;
        }

        .card-price {
            color: #dc3545;
            /* Merah untuk harga */
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 15px;
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

        /* Label Diskon Kecil di pojok gambar */
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
                        <a class="nav-link active fw-bold" href="makanan-kucing">MAKANAN KUCING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="makanan-anjing">MAKANAN ANJING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center text-white">
                    @if(session('user_login'))
                        <span class="me-3 d-none d-lg-block">Hi, {{ session('user_nama') }}</span>
                    @endif
                    <a href="#" class="text-white me-3 fs-5"><i class="bi bi-search"></i></a>
                    <a href="#" class="text-white me-3 fs-5"><i class="bi bi-heart"></i></a>
                    <a href="#" class="text-white fs-5"><i class="bi bi-bag"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="category-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Makanan Kucing</li>
                </ol>
            </nav>
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold m-0" style="color: #333;">Katalog Makanan Kucing</h2>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/Supercat Baby Kitten 95gr.jpeg" class="card-img-top" alt="Whiskas">
                    <div class="card-body">
                        <h5 class="card-title">Supercat Baby Kitten 95gr</h5>
                        <p class="card-price">Rp 10.500 <s class="text-muted small fw-normal">Rp 13.000</s></p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/50pcs Cemilan Kucing Kitten Snack Kucing.jpeg" class="card-img-top"
                        alt="50pcs Cemilan Kucing Kitten Snack Kucing">
                    <div class="card-body">
                        <h5 class="card-title">50pcs Cemilan Kucing Kitten Snack Kucing</h5>
                        <p class="card-price">Rp 51.000</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/baju kucing.jpeg" class="card-img-top" alt="Me-O">
                    <div class="card-body">
                        <h5 class="card-title">Baju Kucing Lucu Tema GoCat Outfit Anabul Parodi Driver Gokil</h5>
                        <p class="card-price">Rp 11.000</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/pohon cakaran.jpeg" class="card-img-top" alt="Friskies">
                    <div class="card-body">
                        <h5 class="card-title">Pohon Cakaran Garukan Kucing Stratcher Tree</h5>
                        <p class="card-price">Rp 53.391</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <span class="badge-discount">50% OFF</span>
                    <img src="/images/cat toy.jpeg" class="card-img-top" alt="Bolt">
                    <div class="card-body">
                        <h5 class="card-title">Interactive Cat Toy Chase Run Exercise Mental Stimulation</h5>
                        <p class="card-price">Rp 1.698.500 <s class="text-muted small fw-normal">Rp 3.397.000</s></p></p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/olive care.jpeg" class="card-img-top" alt="Vitamin">
                    <div class="card-body">
                        <h5 class="card-title">Olive Care Kucing</h5>
                        <p class="card-price">Rp 42.800</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/pet bathtub.jpeg" class="card-img-top" alt="Pasir Kucing">
                    <div class="card-body">
                        <h5 class="card-title">TEMPAT MANDI ANJING KUCING | PET BATHTUB</h5>
                        <p class="card-price">Rp 209.000</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="card card-product shadow-sm">
                    <img src="/images/litter box.jpeg" class="card-img-top" alt="Toilet Kucing">
                    <div class="card-body">
                        <h5 class="card-title">Focat TP Litter Box Kucing</h5>
                        <p class="card-price">Rp 40.500</p>
                        <a href="/detail" class="btn btn-detail">Lihat Detail</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="/makanan-kucing">Previous</a></li>
                <li class="page-item"><a class="page-link" href="/makanan-kucing">2</a></li>
                <li class="page-item active"><a class="page-link">3</a></li>
            </ul>
        </div>
    </div>

    <footer class="text-center py-4 bg-light mt-5">
        <p class="text-muted small m-0">&copy; {{ date('Y') }} Pet Shop Indonesia. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>