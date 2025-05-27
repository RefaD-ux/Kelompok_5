<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Kos di Seluruh Indonesia - Kosku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}">
                <img src="{{ asset('images/kosku.png') }}" alt="Kosku" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('filter.kos') }}">Sewa Kos</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('favorites.index') }}">
                            <i class="bi bi-heart"></i> Favorite
                            <span class="badge bg-danger favorite-count">
                                {{ auth()->check() ? auth()->user()->favorites()->count() : 0 }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Bantuan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero bg-light py-5 mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="hero-title">Mau Cari Kos?</h1>
                    <p class="hero-description mb-4">Dapatkan infonya dan langsung sewa di Kosku.</p>
                    <form class="search-box" method="GET" action="{{ route('cari.kos') }}">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" name="lokasi" placeholder="Masukkan lokasi/area/alamat">
                            <button class="btn btn-success search-button" type="submit">Cari Kos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <section class="promo-section container text-center my-5">
        <h2>Penawaran Menarik</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <img src="{{ asset('images/promo1.png') }}" alt="Promo 1" class="img-fluid promo-image">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/promo2.png') }}" alt="Promo 2" class="img-fluid promo-image">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/promo3.png') }}" alt="Promo 3" class="img-fluid promo-image">
            </div>
        </div>
    </section>

    <section class="kos-list-section container text-center my-5">
        <h2>Rekomendasi Kos Terbaru</h2>
        <div class="row justify-content-center g-4">
            @if ($result->count() > 0)
                @foreach ($result->take(6) as $kos)
                    <div class="col-md-4">
                        <div class="card h-100 kos-card">
                            @if ($kos->gambar)
                                <img src="{{ asset('uploads/' . $kos->gambar) }}" class="card-img-top kos-card-img" alt="{{ $kos->nama }}">
                            @else
                                <img src="{{ asset('images/default-kos.jpg') }}" class="card-img-top kos-card-img" alt="Kos">
                            @endif
                            <div class="card-body kos-card-body">
                                <button class="btn favorite-btn" data-kos-id="{{ $kos->id }}">
                                    <i class="bi bi-heart{{ auth()->check() && auth()->user()->favorites->contains($kos->id) ? '-fill text-danger' : '' }}"></i>
                                </button>
                                <h5 class="card-title kos-card-title">{{ $kos->nama }}</h5>
                                <p class="card-text kos-card-location"><i class="bi bi-geo-alt-fill"></i> {{ $kos->lokasi }}</p>
                                <p class="card-text kos-card-price text-success fw-bold">Rp{{ number_format($kos->harga) }}/bulan</p>
                                <a href="#" class="btn btn-primary kos-card-detail-btn">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="no-kos-message">Belum ada kos yang tersedia saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk menangani favorit
            document.querySelectorAll('.favorite-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const kosId = this.getAttribute('data-kos-id');
                    const heartIcon = this.querySelector('i');
                    
                    // Kirim request AJAX ke server
                    fetch(`/favorites/${kosId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        credentials: 'same-origin'
                    })
                    .then(response => {
                        if (response.status === 401) {
                            window.location.href = '/login';
                            return;
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            if(data.status === 'added') {
                                heartIcon.classList.remove('bi-heart');
                                heartIcon.classList.add('bi-heart-fill', 'text-danger');
                            } else {
                                heartIcon.classList.remove('bi-heart-fill', 'text-danger');
                                heartIcon.classList.add('bi-heart');
                            }
                            updateFavoriteCount(data.count);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                });
            });

            // Fungsi untuk update counter favorit
            function updateFavoriteCount(count) {
                const counters = document.querySelectorAll('.favorite-count');
                counters.forEach(counter => {
                    counter.textContent = count;
                });
            }
        });
    </script>
</body>
</html>