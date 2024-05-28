<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Rt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RT_PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengumuman
        $type_menu = 'pengumuman';

        $pengumuman = Pengumuman::join('penduduk', 'pengumuman.nik', '=', 'penduduk.nik')
            ->select('pengumuman.*', 'penduduk.nama')
            ->get();
        return view('rt.rt_data_pengumuman.index', compact('type_menu', 'pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'pengumuman';
        $rt = Rt::all();

        // Panggil fungsi untuk membuat kode unik
        $uniqueCode = $this->generateUniqueCode();

        return view('rt.rt_data_pengumuman.create', compact('type_menu', 'rt', 'uniqueCode'));
    }

    private function generateUniqueCode()
    {
        do {
            $code = strtoupper(Str::random(6));
        } while (Pengumuman::where('id_pengumuman', $code)->exists());

        return $code;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'kepentingan' => 'required|string',
            'masa_berlaku' => 'required|date',
            'isi_pengumuman' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rt' => 'required|array',
            'rt.*' => 'integer|exists:rt,id_rt',
        ]);

        // Create a new Pengumuman instance
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $request->input('judul');
        $pengumuman->kepentingan = $request->input('kepentingan');
        $pengumuman->tanggal_pengumuman = $request->input('masa_berlaku');
        $pengumuman->isi_pengumuman = $request->input('isi_pengumuman');
        $pengumuman->id_pengumuman = $request->input('id_pengumuman');
        $pengumuman->nik = auth()->user()->nik;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('pengumuman'), $fileName);
            $pengumuman->foto = $fileName;
        }

        // Save the Pengumuman instance
        $pengumuman->save();

        // Save data to the pengumuman_rt table
        foreach ($request->input('rt') as $rtId) {
            DB::table('pengumuman_rt')->insert([
                'id_pengumuman' => $pengumuman->id_pengumuman,
                'id_rt' => $rtId,
            ]);
        }

        return redirect()->route('rt_pengumuman.index')->with('success', 'Pengumuman berhasil disimpan');
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
