<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;

class KategoriController extends Controller
{
    // get all list of kategoris
    public function index()
    {
        $kategoris = Kategori::all();
        $title = 'Hapus Data?';
        $text = 'Apakah anda yakin ingin menghapus data ini?';
        confirmDelete($title, $text);
        return view('pages.admin.category.index', compact('kategoris'));
    }

    public function create()
    {
        return view('pages.admin.category.add');
    }

    // store new kategori
    public function store(Request $request)
    {

        $request->validate([
            'jenis' => 'required|string|min:4',
        ], [
            'jenis.required' => 'Jenis kategori tidak boleh kosong!',
            'jenis.min' => 'Jenis kategori minimal 4 karakter!',
        ]);

        Kategori::create([
            'jenis' => $request->jenis,
        ]);

        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Kategori berhasil ditambahkan!');
        return redirect()->route('categories');
    }
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('pages.admin.category.update', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required|string|min:4',
        ], [
            'jenis.required' => 'Jenis kategori tidak boleh kosong!',
            'jenis.min' => 'Jenis kategori minimal 4 karakter!',
        ]);
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Kategori berhasil diupdate!');
        return redirect()->route('categories');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        if ($kategori->delete()) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Kategori berhasil dihapus!');
        }
        return redirect()->route('categories');
    }
}
