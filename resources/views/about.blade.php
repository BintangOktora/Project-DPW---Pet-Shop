<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Pet Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* --- Navbar Style (Sama dengan Home) --- */
        .custom-navbar {
            background-color: #e4710cff;
        }

        /* --- Styles Khusus Halaman About --- */
        .about-heading {
            font-weight: 800;
            color: #333;
        }

        .text-justify {
            text-align: justify;
        }

        /* Style untuk Section "Why Choose Us" */
        .why-choose-us-section {
            background-color: #fcf6ea;
            /* Warna krem muda */
            padding: 40px 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .feature-box {
            text-align: center;
            padding: 20px;
        }

        .feature-icon {
            font-size: 3rem;
            color: #e4710cff;
            /* Warna tema */
            margin-bottom: 10px;
        }

        .feature-title {
            font-weight: 900;
            /* Font tebal seperti di gambar */
            font-size: 1.5rem;
            color: #4a3b2b;
            /* Warna coklat tua */
        }

        /* untuk gambar responsif dan rounded */
        .img-rounded-custom {
            border-radius: 8px;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
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
                        <a class="nav-link" href="makanan-kucing">MAKANAN KUCING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="makanan-anjing">MAKANAN ANJING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="/about">About Us</a>
                    </li>
                </ul>

                @if(session('user_login'))
                    <span class="navbar-text text-white me-3">
                        Halo, {{ session('user_nama') }}
                    </span>
                    <a href="/wishlist" class="text-white ms-3 fs-5 me-3"><i class="bi bi-heart"></i></a>
                    <a href="/keranjang" class="text-white ms-3 fs-5 me-3"><i class="bi bi-bag"></i></a>
                    <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
                @else
                    <a href="/login" class="btn btn-sm btn-light me-2">Login</a>
                    <a href="/register" class="btn btn-sm btn-outline-light">Register</a>
                @endif
            </div>
        </div>
    </nav>

    <div class="container my-5">

        <div class="row mb-5">
            <div class="col-12">
                <h2 class="about-heading mb-3">Petshop - Your Pet's Best Friend.</h2>

                <img src='/images/kucing.jpg' alt="Tim Pet Shop" class="img-fluid img-rounded-custom mb-4 shadow-sm"
                    style="max-height: 400px; width:100%; object-fit: cover;">

                <p class="text-muted mb-2">Hai, Pet Parents!</p>
                <p>
                    Kami adalah komunitas pencinta hewan, destinasi one-stop shopping untuk segala kebutuhan
                    hewan kesayangan Anda.
                    Kami hadir untuk mempermudah hidup Anda dalam merawat si kecil, mulai dari makanan, mainan, vitamin,
                    hingga perlengkapan kebersihan.
                </p>
                <p class="fst-italic text-secondary">
                    Visi Kami: Menciptakan dunia di mana setiap hewan peliharaan sehat, bahagia, dan terawat dengan
                    baik.
                </p>
            </div>
        </div>

        <hr class="my-5">

        <div class="row align-items-center mb-5">
            <div class="col-md-5 mb-3 mb-md-0">
                <img src='/images/bos2.png' alt="Awal Mula Kami" class="img-rounded-custom shadow-sm">
            </div>
            <div class="col-md-7 ps-md-5">
                <h3 class="about-heading mb-3">Awal Mula Kami</h3>
                <p>
                    Cerita kami dimulai dari hal yang sederhana: rasa cinta yang besar terhadap hewan peliharaan.
                </p>
                <p>
                    Kami tahu bahwa bagi Anda, hewan peliharaan bukan sekadar binatang, melainkan sahabat setia,
                    penghibur di kala lelah, dan bagian tak terpisahkan dari keluarga.
                </p>
                <p>
                    Didirikan pada tahun <strong>2023</strong>,Petshop kami hadir dengan misi untuk memastikan
                    setiap anabul mendapatkan kasih sayang dan perawatan terbaik.
                </p>
                <p>
                    Kami berawal dari hobi merawat kucing dan anjing sendiri di garasi rumah, dan kini berkembang
                    menjadi rumah bagi kebutuhan hewan peliharaan Anda.
                </p>
            </div>
        </div>

        <div class="why-choose-us-section text-center">
            <h3 class="about-heading mb-5">WHY CHOOSE US</h3>

            <div class="row">
                <div class="col-md-4 feature-box">
                    <i class="bi bi-shield-check feature-icon"></i>
                    <h4 class="feature-title mt-2">Kualitas</h4>
                    <p class="small text-muted">Produk terjamin asli dan aman.</p>
                </div>

                <div class="col-md-4 feature-box border-start border-end"> <i
                        class="bi bi-people-fill feature-icon"></i>
                    <h4 class="feature-title mt-2">Pecinta</h4>
                    <p class="small text-muted">Dilayani oleh sesama pet lovers.</p>
                </div>

                <div class="col-md-4 feature-box">
                    <i class="bi bi-bag-heart-fill feature-icon"></i>
                    <h4 class="feature-title mt-2">Lengkap</h4>
                    <p class="small text-muted">Semua kebutuhan anabul ada di sini.</p>
                </div>
            </div>

            <p class="text-muted mt-4 mb-0">
                Belanja kebutuhan anabul kini lebih mudah, hemat, dan menyenangkan hanya ada di toko kami.
            </p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <footer class="text-center py-4 bg-light mt-5">
        <p class="text-muted small mt-2">&copy; {{ date('Y') }} Pet Shop Indonesia</p>
    </footer>
</body>

</html>