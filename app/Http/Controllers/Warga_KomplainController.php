<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;

class Warga_KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $type_menu = 'komplain';
        $komplain = Komplain::where('nik', auth()->user()->nik)->get();
        return view('warga.komplain.index',compact('type_menu','komplain'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'komplain';
        $kategori = \App\Models\KategoriKomplain::all();
        return view('warga.komplain.create',compact('type_menu','kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_komplain_id' => 'required|exists:kategori_komplain,id_kategori_komplain',
            'pekerjaan' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $komplain = new Komplain();
        $komplain->judul_komplain = $request->input('nama');
        $komplain->id_kategori_komplain = $request->input('kategori_komplain_id');
        $komplain->isi_komplain = $request->input('isi');
        $komplain->nik = Auth::user()->nik; // Assuming you have a user relationship and NIK in your user model
        $komplain->status_komplain = 'pending'; // default status

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $komplain->thumbnail = $imagePath;
        }

        $komplain->save();

        return redirect()->route('warga_komplain.index')->with('success', 'Komplain berhasil ditambahkan!');
    
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
