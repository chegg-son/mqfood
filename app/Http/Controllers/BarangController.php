<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['kategori', 'transaksi_detail'])->latest()->paginate(12);
        // get the supplier id from inside $barangs

        $kategoris = Kategori::all();
        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('pages.admin.product.index', compact('barangs', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $suppliers = User::where('is_admin', 3)->get();

        return view('pages.admin.product.add', compact('kategoris', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|string|unique:barangs',
            'nama_barang' => 'required|string|min:3',
            'supplier_id' => [
                'required',
                Rule::exists('users', 'id')->where('is_admin', 3),
            ],
            'gambar_barang' => 'required|image|mimes:jpeg,jpg,png|max:1024',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:100',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'kode_barang.unique' => 'Kode barang sudah ada!',
            'kode_barang.required' => 'Kode barang harus diisi!',
            'kode_barang.min' => 'Kode barang minimal 3 karakter!',
            'nama_barang.required' => 'Nama harus diisi!',
            'nama_barang.min' => 'Nama minimal 3 karakter!',
            'supplier_id.required' => 'Supplier harus diisi!',
            'supplier_id.exists' => 'Supplier tidak ditemukan!',
            'gambar_barang.required' => 'Gambar wajib diisi!',
            'gambar_barang.image' => 'File harus berupa gambar!',
            'gambar_barang.mimes' => 'File harus berupa jpeg,png,jpg!',
            'gambar_barang.max' => 'File maksimal 1 MB!',
            'stok.numeric' => 'Stok harus berupa angka!',
            'stok.required' => 'Stok harus diisi!',
            'stok.min' => 'Stok minimal 0!',
            'harga.required' => 'Harga harus diisi!',
            'harga.min' => 'Harga minimal Rp 100!',
            'kategori_id.required' => 'Kategori harus diisi!',
            'kategori_id.exists' => 'Kategori tidak ditemukan!',
        ]);
        // dd($request->all());
        $file = $request->file('gambar_barang');
        $file->storeAs('public/barangs', $file->hashName());

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'supplier_id' => $request->supplier_id,
            'gambar_barang' => $file->hashName(),
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kelas' => $request->kelas,
            'kategori_id' => $request->kategori_id,
        ]);

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil ditambahkan!');
        return redirect()->route('master.product');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();
        return view('pages.admin.product.update', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'kode_barang' => 'required|string|min:3',
            'nama_barang' => 'required|string|min:3',
            'gambar_barang' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'kode_barang.required' => 'Kode barang harus diisi!',
            'kode_barang.min' => 'Kode barang minimal 3 karakter!',
            'nama_barang.required' => 'Nama harus diisi!',
            'nama_barang.min' => 'Nama minimal 3 karakter!',
            'gambar_barang.image' => 'File harus berupa gambar!',
            'gambar_barang.mimes' => 'File harus berupa jpeg,png,jpg!',
            'gambar_barang.max' => 'File maksimal 1 MB!',
            'stok.numeric' => 'Stok harus berupa angka!',
            'stok.required' => 'Stok harus diisi!',
            'stok.min' => 'Stok minimal 0!',
            'harga.required' => 'Harga harus diisi!',
            'harga.min' => 'Harga minimal 0!',
            'kategori_id.required' => 'Kategori harus diisi!',
            'kategori_id.exists' => 'Kategori tidak ditemukan!',
        ]);

        $barang = Barang::findOrFail($id);

        $file = $request->file('gambar_barang');
        if ($file) {
            $file->storeAs('public/barangs', $file->hashName());
            $barang->update([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'gambar_barang' => $file->hashName(),
                'stok' => $request->stok,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
            ]);
        } else {
            $barang->update([
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
            ]);
        }

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil diubah!');
        return redirect()->route('master.product');
    }

    public function destroy($id)
    {
        $barang = Barang::find($id);
        if ($barang->delete()) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil dihapus!');
        }
        return redirect()->route('master.product');
    }

    public function search(Request $request)
    {
        $kategoris = Kategori::all();
        $search = $request->input('query');
        $barangs = Barang::where(function ($query) use ($search) {
            $query->where('nama_barang', 'like', "%$search%");
        })->paginate(12);

        return view('pages.home.index', compact('barangs', 'search', 'kategoris'));
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('pages.home.show.index', compact('barang'));
    }
}
