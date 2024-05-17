<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengumuman
        $type_menu = 'pengumuman';
        return view('rw.data_pengumuman.index', compact('type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $type_menu = 'pengumuman';

        //ambil data pengumuman
        $rt = \App\Models\Rt::all();




        return view('rw.data_pengumuman.create', compact('type_menu','rt'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'nama' => 'required|string|max:255',
            'agama' => 'required|string',
            'masa_berlaku' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rt' => 'required|array',
            'rt.*' => 'exists:rt,id_rt',
            'alamat' => 'required|string',
        ]);

        // Simpan data pengumuman
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->input('nama');
        $pengumuman->kepentingan = $request->input('agama');
        $pengumuman->tanggal_pengumuman = $request->input('masa_berlaku');
        $pengumuman->isi_pengumuman = $request->input('alamat');
        
        // Cek apakah ada file yang diupload
        if ($request->hasFile('foto')) {
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $pengumuman->foto = $fileName;
        }

        $pengumuman->save();

        // Simpan data ke tabel pengumuman_rt
        foreach ($request->input('rt') as $rtId) {
            DB::table('pengumuman_rt')->insert([
                'id_pengumuman' => $pengumuman->id,
                'id_rt' => $rtId,
            ]);
        }

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil disimpan');
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
