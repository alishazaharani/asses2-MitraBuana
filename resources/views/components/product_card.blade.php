<div class="col-6 col-sm-4 col-md-3 col-lg-2">
    <div class="card h-100 shadow-sm" style="border-radius:10px;">

        <img src="{{ asset('storage/'.$item->gambar) }}"
             class="card-img-top"
             style="height:130px; object-fit:cover; border-radius:10px 10px 0 0;">

        <div class="card-body p-2 text-center">
            <h6 style="font-size:14px;">{{ $item->nama_barang }}</h6>
            <p class="m-0" style="font-size:13px;">
                <strong>Rp {{ number_format($item->harga,0,',','.') }}</strong>
            </p>

            <button class="btn btn-sm btn-outline-success mt-2"
                    data-bs-toggle="modal"
                    data-bs-target="#modal_{{ $item->id }}">
                Detail
            </button>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ $item->nama_barang }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <img src="{{ asset('storage/'.$item->gambar) }}"
                     class="img-fluid mb-3" style="border-radius:10px;">
                <p>{{ $item->deskripsi ?? 'Tidak ada deskripsi produk.' }}</p>
            </div>

        </div>
    </div>
</div>
