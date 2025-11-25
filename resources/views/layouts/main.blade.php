<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Buana Minimarket</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    

</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container d-flex align-items-center">

        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('storage/logo.png') }}" alt="logo" style="height:55px;">
        </a>

        <!-- Tombol Kategori -->
        <button class="btn btn-light border ms-3" style="font-weight:600;">
            Kategori
        </button>

        <!-- Search Bar -->
        <form action="{{ route('search') }}" method="GET" class="flex-grow-1 mx-4 position-relative">
            <div class="input-group">
                <span class="input-group-text bg-white">
                    <i class="bi bi-search"></i>
                </span>
                <input type="text" name="keyword" id="searchInput" class="form-control" placeholder="Cari di Mitra Buana">
            </div>

            <!-- preview autocomplete -->
            <div id="searchPreviewBox"
                 class="position-absolute bg-white shadow rounded w-100 mt-1 d-none"
                 style="z-index: 10;">
            </div>
        </form>

        <!-- Cart -->
        <a href="#" class="text-dark me-4">
            <i class="bi bi-cart3" style="font-size: 24px;"></i>
        </a>

        <!-- About -->
        <a href="{{ route('about') }}" class="text-dark me-4" style="font-weight: 500;">
    About
</a>


        {{-- Auth Buttons / User Icon --}}
       @guest
    <a href="/login" class="btn btn-outline-primary me-2 px-4" style="border-radius: 8px;">Masuk</a>
    <a href="/register" class="btn text-white px-4" style="background:#001b6d; border-radius: 8px;">Daftar</a>
@endguest

@auth
    <div class="dropdown">
        <a class="text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-4"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="/">Beranda</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </div>
@endauth



        @auth
            <div class="dropdown">
                <a class="d-flex align-items-center text-dark text-decoration-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4"></i>
                    <span class="ms-1">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

    </div>
</nav>



<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let keyword = this.value;

    if (keyword.length < 2) {
        document.getElementById('searchResult').style.display = 'none';
        return;
    }

    fetch(`/search-autocomplete?keyword=${keyword}`)
        .then(res => res.json())
        .then(data => {
            let resultBox = document.getElementById('searchResult');
            resultBox.innerHTML = '';

            if (data.length === 0) {
                resultBox.innerHTML = '<p class="p-2 m-0 text-muted">Produk tidak ditemukan</p>';
            } else {
                data.forEach(item => {
                    resultBox.innerHTML += `
                        <a href="/search?keyword=${item.nama_barang}"
                           class="d-flex align-items-center p-2 text-decoration-none text-dark preview-item">
                            <img src="/storage/${item.gambar}" width="45" height="45"
                                 style="object-fit:cover; border-radius:5px; margin-right:10px;">
                            <div>
                                <strong>${item.nama_barang}</strong>
                                <br><small class="text-muted">${item.kategori}</small>
                            </div>
                        </a>
                    `;
                });
            }

            resultBox.style.display = 'block';
        });
});
</script>

    {{-- CONTENT PAGES --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p class="m-0">© 2024 Mitra Buana Minimarket</p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
.promo-img {
    width: 85%;
    height: 320px;
    object-fit: cover;
    border-radius: 12px;    
}
</style>
</body>
</html>
