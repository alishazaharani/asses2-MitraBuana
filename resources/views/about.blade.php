@extends('layouts.main')

@section('content')
<div class="container py-5">

    <h1 class="text-center fw-bold mb-4">Tentang Kami</h1>

    <p class="fs-5 text-center mb-5">
        Mitra Buana Minimarket hadir untuk memenuhi kebutuhan belanja masyarakat dengan harga terjangkau
        dan pelayanan terbaik. Kami berkomitmen menyediakan produk yang aman, berkualitas, dan lengkap
        untuk kebutuhan rumah tangga Anda.
    </p>

    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/logo.png') }}" width="120" class="mb-3">
            <h4 class="fw-semibold">Visi</h4>
            <p>Menjadi minimarket terpercaya dengan pelayanan terbaik dan produk berkualitas.</p>
        </div>
        <div class="col-md-4 text-center">
            <h4 class="fw-semibold">Misi</h4>
            <ul class="text-start d-inline-block">
                <li>Menyediakan kebutuhan harian yang lengkap dan berkualitas.</li>
                <li>Harga yang bersahabat untuk semua kalangan.</li>
                <li>Memberikan kenyamanan dan kepuasan pelanggan.</li>
            </ul>
        </div>
    </div>

</div>
@endsection
