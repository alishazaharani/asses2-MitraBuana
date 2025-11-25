@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2>Daftar Barang</h2>
   <a href="{{ route('barang.create') }}" class="btn btn-primary">Tambah Barang</a>
   <a href="{{ route('kategori.index') }}" class="btn btn-success">Tambah Kategori</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->stok }}</td>
                <td>Rp {{ number_format($b->harga,0,',','.') }}</td>
                <td>{{ $b->kategori }}</td>
                <td>
                    @if($b->gambar)
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#gambarModal{{ $b->id }}">Lihat Gambar</button>

                        {{-- modal --}}
                        <div class="modal fade" id="gambarModal{{ $b->id }}" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">{{ $b->nama_barang }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <div class="modal-body text-center">
                                <img src="{{ asset('storage/'.$b->gambar) }}" class="img-fluid">
                              </div>
                            </div>
                          </div>
                        </div>
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $b->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
