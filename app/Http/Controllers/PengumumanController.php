<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\pengumuman_rt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Rt;





class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengumuman
        $type_menu = 'pengumuman';

        $pengumuman = Pengumuman::join('penduduk', 'pengumuman.nik', '=', 'penduduk.nik')
        ->where('pengumuman.arsip', 'false')         
        ->get();
        return view('rw.data_pengumuman.index', compact('type_menu','pengumuman'));
    }

    public function arsip($id)
    {
        $pengumuman = Pengumuman::find($id);
    
        if (!$pengumuman) {
            return redirect()->route('pengumuman.index')->with('error', 'Pengumuman not found');
        }
    
        // Update the 'arsip' attribute of the penduduk
        $pengumuman->arsip = 'true'; // Assuming 'true' means archived
    
        // Save the changes
        $pengumuman->save();
    
        return redirect()->route('pengumuman.index')->with('success', 'pengumuman has been archived successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'pengumuman';
        $rt = \App\Models\Rt::all();

        // Panggil fungsi untuk membuat kode unik
        $uniqueCode = $this->generateUniqueCode();

        return view('rw.data_pengumuman.create', compact('type_menu', 'rt', 'uniqueCode'));
    }

    private function generateUniqueCode()
{
    do {
        $code = mt_rand(100000, 999999); // Menghasilkan angka acak antara 100000 dan 999999
    } while (Pengumuman::where('id_pengumuman', $code)->exists());

    return $code;
}


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
{

     // Validate data input


    // Create a new Pengumuman instance
    $pengumuman = new Pengumuman();
    $pengumuman->judul = $request->input('judul');
    $pengumuman->kepentingan = $request->input('kepentingan');
    $pengumuman->tanggal_pengumuman = $request->input('masa_berlaku');
    $pengumuman->isi_pengumuman = $request->input('isi_pengumuman');
    $pengumuman->id_pengumuman = $request->input('id_pengumuman');
    $pengumuman->nik = auth()->user()->nik;

    if ($request->hasFile('foto')) {
        $fileName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('pengumuman'), $fileName);
        $pengumuman->foto = $fileName;
    }

    // Save the Pengumuman instance
    $pengumuman->save();

    // Debugging: Check if the Pengumuman instance has an ID
   

        // Save data to the pengumuman_rt table
        foreach ($request->input('rt') as $rtId) {

            DB::table('pengumuman_rt')->insert([
                'id_pengumuman' => $request->id_pengumuman,
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
    $type_menu = 'pengumuman';
    // Find the Pengumuman instance by its ID
    $pengumuman = Pengumuman::findOrFail($id);


    $pengumuman_rt = DB::table('pengumuman_rt')
    ->join('rt', 'pengumuman_rt.id_rt', '=', 'rt.id_rt');

    // foreach ($pengumuman_rt as $rt) {
    //     echo $rt->id_rt;
    // }

       

    // Return the view with the Pengumuman instance
    return view('rw.data_pengumuman.show', compact('pengumuman','type_menu','pengumuman_rt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $type_menu = 'pengumuman';
         $rt = Rt::all();
         $pengumuman = Pengumuman::findOrFail($id);

         return view('rw.data_pengumuman.edit', compact('pengumuman','rt','type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kepentingan' => 'required|string',
            'masa_berlaku' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isi_pengumuman' => 'required|string',
        ]);

        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->judul = $request->judul;
        $pengumuman->kepentingan = $request->kepentingan;
        $pengumuman->tanggal_pengumuman	 = $request->masa_berlaku;
        $pengumuman->isi_pengumuman = $request->isi_pengumuman;

        if ($request->hasFile('foto')) {
            $fotoName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('pengumuman'), $fotoName);
            $pengumuman->foto = $fotoName;
        }

        $pengumuman->save();

        Alert::success('Success', 'Pengumuman berhasil diupdate');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
