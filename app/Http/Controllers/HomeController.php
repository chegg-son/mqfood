<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $barangs = Barang::latest()->paginate(12);
        // return view('pages.home.index', compact('barangs', 'kategoris'));
        return view('pages.home.index');
    }
}
