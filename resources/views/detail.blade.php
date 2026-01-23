<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* --- Tema Global --- */
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .custom-navbar {
            background-color: #e4710cff;
        }

        /* --- Styles Detail Produk  --- */
        .main-product-img {
            max-width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
        }

        .feature-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 10px;
            text-align: center;
            color: #0d6efd;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .feature-badge i {
            font-size: 24px;
            margin-bottom: 2px;
        }

        .product-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-add-cart {
            background-color: #d1d5db;
            color: #000;
            font-weight: bold;
            border: none;
            padding: 10px 40px;
            border-radius: 5px;
            margin-top: 20px;
            transition: all 0.3s;
        }

        .btn-add-cart:hover {
            background-color: #e4710cff;
            color: white;
        }

        /* --- css style komentar--- */
        .review-section-title {
            text-align: center;
            font-weight: bold;
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 1.5rem;
        }

        /* Container Form komentar */
        .review-form-box {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .review-form-box h5 {
            color: #e4710cff;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .btn-submit-review {
            background-color: #e4710cff;
            color: white;
            border: none;
            font-weight: bold;
        }

        .btn-submit-review:hover {
            background-color: #d35400;
            color: white;
        }

        /* card review */
        .review-card {
            background-color: #e0e0e0;
            border-radius: 50px;
            padding: 15px 40px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
            animation: fadeIn 0.5s ease-in-out;
            /* Animasi review */
        }

        .review-user {
            font-size: 1.1rem;
            color: #000;
            text-transform: capitalize;
        }

        .review-comment {
            font-size: 1.1rem;
            color: #333;
            font-weight: normal;
        }

        .review-date {
            font-size: 0.8rem;
            color: #666;
            margin-left: 10px;
            font-weight: normal;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">PET SHOP</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link active" href="/">Home</a>
                    <li class="nav-item"><a class="nav-link" href="/makanan-kucing">MAKANAN KUCING</a></li>
                    <li class="nav-item"><a class="nav-link" href="/makanan-anjing">MAKANAN ANJING</a></li>
                    <a class="nav-link active" href="/about">About Us</a>
                </ul>
                @if(session('user_login'))
                    <a href="/keranjang" class="btn btn-sm btn-outline-light me-2">
                        <i class="bi bi-cart3"></i> Keranjang
                    </a>
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
    <div class="category-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-2">
                </ol>
            </nav>
            <div class="d-flex justify-content-between align-items-center">
                <div class="container my-5">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <div class="d-flex flex-column justify-content-center me-3" style="width: 60px;">
                                <div class="feature-badge"><i
                                        class="bi bi-box-seam text-primary"></i><span>GARANSI</span></div>
                                <div class="feature-badge"><i class="bi bi-tag text-danger"></i><span
                                        class="text-danger">PROMO</span></div>
                            </div>
                            <div class="flex-grow-1 text-center">
                                <img src="{{ $produk->gambar ?: '/images/whiskas.png' }}" alt="Produk"
                                    class="main-product-img" id="productImage">
                            </div>
                        </div>
                        <div class="col-md-6 pt-3 ps-md-5">
                            <h1 class="product-title">{{ $produk->nama_produk }}</h1>
                            <div class="product-price">Rp {{ number_format($produk->harga_produk, 0, ',', '.') }}</div>
                            <h6>stok:</h6>
                            <h1 class="product-title">{{ $produk->stok }}</h1>

                            <!-- Form untuk menambahkan ke keranjang -->
                            <div class="d-flex gap-2">
                                <form action="/keranjang/add" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                    <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                                    <input type="hidden" name="gambar_produk" value="{{ $produk->gambar }}">
                                    <input type="hidden" name="harga" value="{{ $produk->harga_produk }}">
                                    <input type="hidden" name="jumlah" value="1">
                                    <button type="submit" class="btn-add-cart">+ Keranjang</button>
                                </form>

                                <form action="/wishlist/add" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                    <input type="hidden" name="nama_produk" value="{{ $produk->nama_produk }}">
                                    <input type="hidden" name="gambar_produk" value="{{ $produk->gambar }}">
                                    <input type="hidden" name="harga" value="{{ $produk->harga_produk }}">
                                    <button type="submit" class="btn btn-outline-danger px-4"
                                        style="margin-top: 20px; font-weight: bold; border-radius: 5px; height: 46px;">
                                        <i class="bi bi-heart"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1">
                            <h2 class="review-section-title">Review Produk</h2>

                            <div class="review-form-box">
                                <h5>Tulis Pengalamanmu</h5>
                                <form id="formReview">
                                    <div class="mb-3">
                                        <label class="form-label small text-muted">Komentar Anda</label>
                                        <textarea class="form-control" id="inputKomentar" rows="3" required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-submit-review px-4">Kirim Review</button>
                                    </div>
                                </form>
                            </div>

                            <div id="reviewList">
                                <div class="review-card">
                                    <div class="d-flex align-items-center">
                                        <div class="review-user">Budi Santoso</div>
                                        <span class="review-date"> - 2 hari lalu</span>
                                    </div>
                                    <div class="review-comment">barangnya bagus</div>
                                </div>

                                <div class="review-card">
                                    <div class="d-flex align-items-center">
                                        <div class="review-user">Josh</div>
                                        <span class="review-date"> - 10 hari lalu</span>
                                    </div>
                                    <div class="review-comment">Mantap! pengiriman sesuai app!!👍</div>
                                </div>
                                <div class="review-card">
                                    <div class="d-flex align-items-center">
                                        <div class="review-user">Emily </div>
                                        <span class="review-date"> - 1 bulan lalu</span>
                                    </div>
                                    <div class="review-comment">Anabul saya suka banget sama produk nya😁😍❤️!</div>
                                </div>
                                <div class="review-card">
                                    <div class="d-flex align-items-center">
                                        <div class="review-user">Tamia</div>
                                        <span class="review-date"> - 1 bulan lalu</span>
                                    </div>
                                    <div class="review-comment">Toko nya terpercaya dan seller mudah dihubungi,
                                        saya pasti beli lagi disini❤️❤️👍👍!</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                <script>

                    document.getElementById('formReview').addEventListener('submit', function (e) {
                        e.preventDefault();

                        const komentar = document.getElementById('inputKomentar').value;
                        const namaUser = "Anda ";
                        const waktu = "Baru saja";

                        const newReviewCard = document.createElement('div');
                        newReviewCard.className = 'review-card';

                        newReviewCard.innerHTML = `
                <div class="d-flex align-items-center">
                    <div class="review-user text-primary">${namaUser}</div>
                    <span class="review-date"> - ${waktu}</span>
                </div>
                <div class="review-comment">${komentar}</div>
            `;

                        const listContainer = document.getElementById('reviewList');
                        listContainer.prepend(newReviewCard);

                        document.getElementById('inputKomentar').value = '';
                        alert('Terima kasih! Review Anda berhasil ditambahkan.');
                    });
                </script>
</body>

</html>