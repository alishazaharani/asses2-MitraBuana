@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Tambah Kategori</h2>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control" required placeholder="misal: Alat Dapur">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
