<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;
use Flasher\Prime\FlasherInterface;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('pages.admin.product.index', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('pages.admin.product.add', compact('kategoris'));
    }

    public function add(Request $request, FlasherInterface $flasher)
    {
        $request->validate([
            'kode_barang' => 'required|string|unique:barangs, kode_barang',
            'nama_barang' => 'required|string|min:3',
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
            'kelas' => 'required|string|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
        ], [
            'kode_barang.unique' => 'Kode barang sudah ada!',
            'kode_barang.required' => 'Kode barang harus diisi!',
            'kode_barang.min' => 'Kode barang minimal 3 karakter!',
            'nama_barang.required' => 'Nama harus diisi!',
            'nama_barang.min' => 'Nama minimal 3 karakter!',
            'stok.required' => 'Stok harus diisi!',
            'stok.min' => 'Stok minimal 0!',
            'harga.required' => 'Harga harus diisi!',
            'harga.min' => 'Harga minimal 0!',
            'kelas.required' => 'Kelas harus diisi!',
            'kelas.min' => 'Kelas minimal 1 karakter!',
            'kategori_id.required' => 'Kategori harus diisi!',
            'kategori_id.exists' => 'Kategori tidak ditemukan!',
        ]);

        // $validator = Validator::make($request->all(), [
        //     'kode_barang' => 'required|string|unique:barangs',
        //     'nama_barang' => 'required|string|min:3',
        //     'stok' => 'required|numeric|min:0',
        //     'harga' => 'required|numeric|min:0',
        //     'kelas' => 'required|string|min:1',
        //     'kategori_id' => 'required|exists:kategoris,id',
        // ]);

        // if ($validator->fails()) {
        //     // Misalnya, menambahkan pesan flash untuk error khusus
        //     // flash()->error('Terdapat masalah dengan input yang Anda masukkan!');

        //     // Anda bisa mengakses error dan melakukan tindakan lain jika diperlukan
        //     $errors = $validator->errors();
        //     $kodeBarangError = $errors->first('kode_barang');

        //     // Kembali dengan error
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'kelas' => $request->kelas,
            'kategori_id' => $request->kategori_id,
        ]);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Barang created successfully',
        //     'data' => $request->all(),
        // ]);
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Barang berhasil ditambahkan!');
        return back();
    }
}
