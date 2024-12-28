<?php

namespace App\Http\Controllers;

use App\Models\TokoBuka;
use Illuminate\Http\Request;

class TokoBukaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko_buka = TokoBuka::all();
        return view('pages.admin.opentime.index', compact('toko_buka'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.opentime.update');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'hari' => 'required|array',
            'hari.*' => 'required|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'waktu_buka' => 'required|date_format:H:i',
            'waktu_tutup' => 'required|date_format:H:i|after:waktu_buka',
        ], [
            'hari.required' => 'Hari harus diisi!',
            'hari.*.required' => 'Hari harus diisi!',
            'waktu_buka.required' => 'Waktu buka harus diisi!',
            'waktu_tutup.required' => 'Waktu tutup harus diisi!',
            'waktu_tutup.after' => 'Waktu tutup harus setelah waktu buka!',
        ]);



        TokoBuka::updateOrCreate(
            ['id' => $id],
            [
                'hari' => $request->hari,
                'waktu_buka' => $request->waktu_buka,
                'waktu_tutup' => $request->waktu_tutup,
            ]
        );

        // Flash success message and redirect
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success('Waktu buka toko berhasil diupdate!');
        return redirect()->route('open-time.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}