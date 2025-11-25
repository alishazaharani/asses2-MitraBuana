@extends('layouts.main')

@section('content')
<div class="container py-5">

    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-5 mb-4">
            @if($barang->gambar)
                <img src="{{ asset('storage/'.$barang->gambar) }}" class="img-fluid rounded shadow" alt="{{ $barang->nama_barang }}">
            @else
                <img src="{{ asset('storage/default.png') }}" class="img-fluid rounded shadow" alt="No Image">
            @endif
        </div>

        <!-- Detail Produk -->
        <div class="col-md-7">
            <h2 class="fw-bold">{{ $barang->nama_barang }}</h2>
            <h4 class="text-danger fw-bold mb-3">Rp {{ number_format($barang->harga, 0, ',', '.') }}</h4>

            <p class="mt-3">
                {!! nl2br(e($barang->deskripsi)) !!}
            </p>

            <p class="mt-3">
                <strong>Kategori:</strong> {{ $barang->kategori->nama_kategori ?? '-' }}
            </p>

            <p>
                <strong>Stok Tersedia:</strong> {{ $barang->stok }}
            </p>

            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    ← Kembali
                </a>
                <a href="#" class="btn btn-primary">
                    Tambah ke Keranjang
                </a>
            </div>
        </div>
    </div>

    <hr class="my-5">

    <!-- Produk Lainnya (Opsional) -->
    @if(isset($produkTerkait) && $produkTerkait->count() > 0)
        <h4 class="fw-bold mb-3">Produk Terkait</h4>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            @foreach($produkTerkait as $p)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/'.$p->gambar) }}" class="card-img-top"
                             style="height:200px; object-fit:cover;">
                        <div class="card-body">
                            <h6>{{ $p->nama_barang }}</h6>
                            <p class="fw-bold text-danger">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                        </div>
                        <a href="{{ route('barang.show', $p->id) }}" class="btn btn-outline-primary m-2 btn-sm">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
