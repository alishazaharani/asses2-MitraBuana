@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Edit Kategori</h2>

    <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">← Kembali</a>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" name="nama_kategori" class="form-control"
                   value="{{ $kategori->nama_kategori }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection
