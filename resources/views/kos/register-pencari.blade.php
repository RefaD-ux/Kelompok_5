<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Daftar Pencari Kos</title>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="register-container">
        <form action="{{ url('/register/pencari') }}" method="POST" class="register-form">
            @csrf
            <h2>Daftar Pencari Kos</h2>

            <label for="name">Nama Lengkap</label>
            <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required />

            <label for="phone">No. Telepon</label>
            <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor telepon" required />

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Buat password" required />

            <label for="password_confirmation">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required />

            <button type="submit">Daftar</button>

            <p style="margin-top: 15px;">
                Sudah punya akun? <a href="{{ url('/login/pencari') }}">Login di sini</a>
            </p>
            <p>
                <a href="{{ url('/') }}">Kembali ke Halaman Utama</a>
            </p>
        </form>
    </div>
</body>
</html>
