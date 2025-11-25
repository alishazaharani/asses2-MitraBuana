@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2>Tambah Barang</h2>
    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        {{-- KATEGORI DIAMBIL DARI DATABASE --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            @php
                $kategori = \App\Models\Kategori::all();
            @endphp
        <select name="kategori_id" class="form-control">
            <option value="">-- pilih kategori --</option>
            @foreach($categories as $c)
        <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
         @endforeach
        </select>

        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
