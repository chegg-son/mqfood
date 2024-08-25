<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $kategoris = Kategori::all();
        return view('pages.home.index', compact('barangs', 'kategoris'));
    }
}
