<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function home()
    {
        $kategoriPilihan = Kategori::all();
        $produks = Barang::with('kategori')->orderBy('id','desc')->get();
        return view('home', compact('kategoriPilihan', 'produks'));
    }

    public function index()
    {
        $barangs = Barang::with('kategori')->orderBy('id', 'desc')->get()->map(function($b) {
            $b->price = 'Rp ' . number_format($b->harga, 0, ',', '.');
            return $b;
        });

        return view('admin.barang.index', compact('barangs'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $barang = Barang::with('kategori')
            ->where('nama_barang', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama_kategori', 'LIKE', '%' . $keyword . '%');
            })
            ->paginate(12);

        return view('search', compact('barang', 'keyword'));
    }

    public function create()
    {
        $categories = Kategori::orderBy('nama_kategori')->get();
        return view('admin.barang.create', compact('categories'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_barang' => 'required',
        'stok' => 'required|integer',
        'harga' => 'required',
        'kategori_id' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|image|max:2048',
    ]);

    // ubah harga "87.000" -> 87000
    $validated['harga'] = (int) str_replace('.', '', $validated['harga']);

    if ($request->hasFile('gambar')) {
    $validated['gambar'] = $request->file('gambar')->store('gambar-barang', 'public');
}

    // upload gambar
    $file = $request->file('gambar');
    $namaFile = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('images'), $namaFile);
    $validated['gambar'] = $namaFile;

    Barang::create($validated);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
}


    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $categories = Kategori::orderBy('nama_kategori')->get();

        return view('admin.barang.edit', compact('barang', 'categories'));
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }

    public function show($id)
{
    $barang = Barang::findOrFail($id);

    // Ambil produk kategori sama untuk rekomendasi
    $rekomendasi = Barang::where('id', '!=', $barang->id)
                     ->limit(4)
                     ->get();

    return view('barang.show', compact('barang', 'produkTerkait'));
}

    public function autocomplete(Request $request)
    {
        $keyword = $request->keyword;

        $barang = Barang::with('kategori')
            ->where('nama_barang', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama_kategori', 'LIKE', '%' . $keyword . '%');
            })
            ->limit(5)
            ->get(['id', 'nama_barang', 'gambar', 'harga', 'kategori_id']);

        return response()->json($barang);
    }

    public function searchPreview(Request $request)
    {
        $keyword = $request->q;

        $barang = Barang::with('kategori')
            ->where('nama_barang', 'like', "%$keyword%")
            ->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama_kategori', 'LIKE', "%$keyword%");
            })
            ->take(5)
            ->get(['id', 'nama_barang', 'kategori_id']);

        return response()->json($barang);
    }
}
