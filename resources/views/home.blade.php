<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .custom-navbar {
            background-color: #e4710cff;
        }

        .jumbotron {
            background-image: url('#');
            /* buat taruh gambar dengan mengganti '#' */
            background-size: cover;
            background-position: center 30%;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            padding: 80px 20px;
            text-align: center;
            margin-top: 0;
            border-radius: 0;
            position: relative;
        }

        /* overlay */
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

        /* buat teks berada di atas overlay */
        .jumbotron h1 {
            position: relative;
            z-index: 1;
            font-weight: bold;
            font-size: 2.3rem;
        }
    </style>
</head>

<body>
    <!-- Nav. BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PET SHOP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <a href="/logout" class="btn btn-sm btn-danger ms-2">Logout</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                </ul>

                <!-- jangan dihapus User Info -->
                @if(session('user_login'))
                    <span class="navbar-text text-white me-3">
                        {{ session('user_nama') }}
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
        <h1 class="display-4">Selamat Datang di Website PET SHOP kami!</h1>
    </div>

    <div class="container my-5">
        <h2 class="text-align: left;">PRODUK TERBARU</h2>

        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Makanan Kucing Premium</h5>
                        <p class="card-text">Rp 50.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Makanan Anjing</h5>
                        <p class="card-text">Rp 75.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Snack Hewan</h5>
                        <p class="card-text">Rp 25.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Snack Hewan</h5>
                        <p class="card-text">Rp 25.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Snack Hewan</h5>
                        <p class="card-text">Rp 25.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="#" class="card-img-top" alt="Produk">
                    <div class="card-body text-center">
                        <h5 class="card-title">Snack Hewan</h5>
                        <p class="card-text">Rp 25.000</p>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-lpy6gG5Y2t1Ik5+pUvNbK/CtYQgQki71R+xVQ1BM8DT6vKrrO5gkP7FpC18JN0XH"
        crossorigin="anonymous"></script>

    <footer> <!-- jangan dihapus footer nya-->
        <a href="/admin/login" class="text-muted small">Admin Panel</a>
    </footer>
</body>

</html>