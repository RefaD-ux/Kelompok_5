<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Kos - Kosku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container mt-5 pt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <img src="{{ asset('images/kosku.png') }}" alt="Kosku" height="40">
            <a href="{{ route('beranda') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>

        <h1 class="mb-3">Filter Kos</h1>
        <form class="d-flex gap-2 mb-4">
            <select class="form-select" name="lokasi">
                <option value="">Semua Lokasi</option>
                <option value="jakarta">Jakarta</option>
                <option value="bandung">Bandung</option>
                <option value="bandung">Surabaya</option>
                <option value="bandung">Yogyakarta</option>
                <option value="bandung">Semarang</option>
                <option value="bandung">Malang</option>

            </select>
            <select class="form-select" name="kategori">
                <option value="">Semua Kategori</option>
                <option value="putra">Putra</option>
                <option value="putri">Putri</option>
                <option value="campur">Campur</option>
            </select>
            <select class="form-select" name="periode">
                <option value="">Semua Periode</option>
                <option value="Harian">Hari</option>
                <option value="bulanan">Bulanan</option>
                <option value="tahunan">Tahunan</option>
            </select>
            <input type="number" class="form-control" name="harga_min" placeholder="Harga Min">
            <input type="number" class="form-control" name="harga_max" placeholder="Harga Max">
            <button class="btn btn-primary">Cari</button>
        </form>

        <h2>Hasil Pencarian</h2>
        <div class="alert alert-warning">Tidak ada kos yang ditemukan.</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</body>
</html>
