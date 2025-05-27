<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pilih Role</title>
    <link rel="stylesheet" href="{{ asset('css/role-selection.css') }}">
</head>
<body>
    <div class="container">
        <h2>Pilih Sebagai</h2>

        <!-- Login -->
        <a href="{{ url('/login/pemilik') }}" class="button">Pemilik Kos</a>
        <a href="{{ url('/login/pencari') }}" class="button">Pencari Kos</a>

        <h2>Belum Punya Akun? Daftar di sini</h2>

        <!-- Register -->
        <a href="{{ url('/register/pemilik') }}" class="button register-button">Daftar Pemilik Kos</a>
        <a href="{{ url('/register/pencari') }}" class="button register-button">Daftar Pencari Kos</a>
    </div>
</body>
</html>
