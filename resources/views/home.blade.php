@extends('layouts.main')

@section('content')
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="00">

    <!-- Indicators -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2"></button>
    </div>

     <!-- Slides -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('storage/banners/banner1.png') }}" class="d-block w-100 banner-img" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/banners/banner2.png') }}" class="d-block w-100 banner-img" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/banners/banner3.png') }}" class="d-block w-100 banner-img" alt="">
        </div>
    </div>


    <!-- Prev / Next -->
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

{{-- KATEGORI PILIHAN --}}
<div class="container py-4">
    <h4 class="fw-bold mb-3">Kategori Pilihan</h4>

    <div class="position-relative">
        <button class="btn btn-light shadow-sm category-prev">&#10094;</button>

        <div class="category-wrapper d-flex gap-3 overflow-hidden">
            {{-- ITEM KATEGORI --}}
            <a href="/search?keyword=Makanan Kering" class="category-item text-center">
                <img src="/storage/kategori/snack.jpg" alt="">
                <p class="mt-2">Makanan<br>Kering</p>
            </a>
            <a href="/search?keyword=Kecantikan" class="category-item text-center">
                <img src="/storage/kategori/Kecantikan.jpg" alt="">
                <p class="mt-2">Kecantikan</p>
            </a>
            <a href="/search?keyword=Sembako" class="category-item text-center">
                <img src="/storage/kategori/sembako.jpg" alt="">
                <p class="mt-2">Sembako</p>
            </a>
            <a href="/search?keyword=Minuman" class="category-item text-center">
                <img src="/storage/kategori/minuman.jpg" alt="">
                <p class="mt-2">Minumann<br>Segar</p>
            </a>
            <a href="/search?keyword=Kebersihan" class="category-item text-center">
                <img src="/storage/kategori/kebersihan.png" alt="">
                <p class="mt-2">Kebersihan<br>Alat</p>
            </a>
            <a href="/search?keyword=Tas Ransel" class="category-item text-center">
                <img src="/storage/kategori/tas ransel.jpg" alt="">
                <p class="mt-2">Tas<br>Ransel</p>
            </a>
            <a href="/search?keyword=Mainan" class="category-item text-center">
                <img src="/storage/kategori/mainan.jpg" alt="">
                <p class="mt-2">Mainan<br>Anak</p>
            </a>
            <a href="/search?keyword=Sepatu" class="category-item text-center">
                <img src="/storage/kategori/sepatu.jpg" alt="">
                <p class="mt-2">Sepatu<br>Pria</p>
            </a>

            {{-- Kamu bisa tambah lagi sesuai kebutuhan --}}
        </div>

        <button class="btn btn-light shadow-sm category-next">&#10095;</button>
    </div>
</div>
{{-- SCROLL BUTTONS --}}
    <div class="d-flex justify-content-between mt-2">
        <button onclick="scrollCategory(-200)" class="btn btn-light">❮</button>
        <button onclick="scrollCategory(200)" class="btn btn-light">❯</button>
    </div>
</div>

{{-- SEMUA PRODUK --}}
<div class="container py-4">
    <h2 class="mb-3">Semua Produk</h2>

    @if($produks->isEmpty())
        <p class="text-muted">Belum ada produk.</p>
    @else
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach($produks as $produk)
                <div class="col">
                    <div class="card h-100">
                        @if($produk->gambar)
                            <img src="{{ asset('storage/'.$produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama_barang }}" style="height:200px; object-fit:cover;">
                        @else
                           {{ $produk->gambar }}
                            <img src="{{ Storage::url($produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama_barang }}">

                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                            <p class="card-text fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('barang.show', $produk->id) }}" class="btn btn-primary btn-sm">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
function scrollCategory(val) {
    document.querySelector('.category-scroll')
        .scrollBy({ left: val, behavior: 'smooth' });
}
</script>
@endsection