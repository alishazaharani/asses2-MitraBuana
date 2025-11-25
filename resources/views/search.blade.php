@extends('layouts.main')

@section('content')

<div class="container py-4">
    <h3 class="mb-3">Hasil Pencarian: "{{ $keyword }}"</h3>

    <div class="row g-3">
        @forelse($barang as $item)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card h-100 shadow-sm">

                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         class="card-img-top"
                         style="height:130px; object-fit:cover;">

                    <div class="card-body p-2 text-center">
                        <h6 style="font-size:14px; min-height:38px;">
                            {{ $item->nama_barang }}
                        </h6>
                        <p class="m-0" style="font-size:13px;">
                            <strong>Rp {{ number_format($item->harga,0,',','.') }}</strong>
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted text-center">Produk tidak ditemukan.</p>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $barang->links() }}
    </div>
</div>

@endsection
