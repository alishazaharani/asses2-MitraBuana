@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2>Edit Barang</h2>
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control"
                value="{{ $barang->nama_barang }}" required>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control"
                value="{{ $barang->stok }}" required>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control"
                value="{{ $barang->harga }}" required>
        </div>

        {{-- ⬇⬇ Ubah bagian kategori --}}
        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $barang->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $barang->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Gambar Sekarang</label><br>
            @if($barang->gambar)
                <img src="{{ asset('storage/'.$barang->gambar) }}" width="200" class="mb-3">
            @else
                <p>Tidak ada gambar</p>
            @endif
            <input type="file" name="gambar" class="form-control">
        </div>

        <button class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
