<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Warga_KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'komplain';
        $komplain = Komplain::where('nik', auth()->user()->nik)->get();
        return view('warga.komplain.index', compact('type_menu', 'komplain'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'komplain';
        $nik = auth()->user()->nik;

        $kategori = \App\Models\KategoriKomplain::all();
        return view('warga.komplain.create', compact('type_menu', 'kategori','nik'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Handle file upload
    if ($request->hasFile('foto_komplain')) {
        $imagePath = $request->file('foto_komplain')->store('komplain_images');
    } else {
        $imagePath = null;
    }

    // Create komplain
    $komplain = new Komplain();
    $komplain->judul_komplain = $request->judul_komplain;
    $komplain->id_kategori_komplain = $request->id_kategori_komplain;
    $komplain->nik = $request->nik;
    $komplain->isi_komplain = $request->isi_komplain;
    $komplain->foto_komplain = $imagePath;
    $komplain->status_komplain = 'Diterima'; // Assuming initial status is 'Diterima'
    $komplain->save();

    // Redirect with success message
    return redirect()->route('warga_komplain.index')->with('success', 'Komplain berhasil dibuat.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Show the specified resource
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Show the form for editing the specified resource
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Update the specified resource in storage
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Remove the specified resource from storage
    }
}
