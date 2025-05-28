@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kos Favorit</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset('images/Kos1.png') }}" class="card-img-top" alt="Kos 1">
                <div class="card-body">
                    <h5 class="card-title">Kos Mawar</h5>
                    <p class="card-text">Rp 1.000.000 / bulan</p>
                    <form action="{{ route('favorites.destroy', 1) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus dari Favorit</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tambahkan kos lainnya jika perlu --}}
    </div>
</div>
@endsection
