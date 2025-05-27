<!DOCTYPE html>
<html>
<head>
    <title>Login {{ ucfirst(request()->segment(2)) }}</title>
    <link rel="stylesheet" href="{{ asset('css/role-selection.css') }}">
</head>
<body>
    <h2>Login sebagai {{ ucfirst(request()->segment(2)) }}</h2>

    {{-- Pesan sukses/error --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <br><br>
        <input type="password" name="password" placeholder="Password" required>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
