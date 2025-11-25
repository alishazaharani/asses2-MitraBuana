<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
        'nama_barang',
        'stok',
        'harga',
        'kategori',
        'deskripsi',
        'gambar'
    ];
    // helper untuk price format di model (bisa dipanggil di blade: $item->price_formatted)
     public function getPriceFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

public function kategori()
{
    return $this->belongsTo(Kategori::class, 'kategori_id');
}

}
