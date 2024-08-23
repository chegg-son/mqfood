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
        return view('pages.home.index', compact('kategoris'));
    }

    // store new kategori
    public function store(Request $request)
    {

        $request->validate([
            'jenis' => 'required',
        ]);

        Kategori::create([
            'jenis' => $request->nama,
        ]);

        return response()->json(['success' => true]);
    }
}
