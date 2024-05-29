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
        $rt = \App\Models\Rt::skip(1)->first(); // Mengambil hanya RT kedua
    
        // Panggil fungsi untuk membuat kode unik
        $uniqueCode = $this->generateUniqueCode();
    
        return view('rt.rt_data_pengumuman.create', compact('type_menu', 'rt', 'uniqueCode'));
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
        $pengumuman->id_pengumuman = $this->generateUniqueCode(); // Generate and set the unique code
        $pengumuman->judul = $request->input('judul');
        $pengumuman->kepentingan = $request->input('kepentingan');
        $pengumuman->tanggal_pengumuman = $request->input('masa_berlaku');
        $pengumuman->isi_pengumuman = $request->input('isi_pengumuman');
        $pengumuman->nik = auth()->user()->nik;
    
        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('rt_data_pengumuman'), $fileName);
            $pengumuman->foto = $fileName;
        }
    
        // Save the Pengumuman instance
        $pengumuman->save();
    
        // Use the saved id_pengumuman from the Pengumuman instance
        $idPengumuman = $pengumuman->id_pengumuman;
    
        // Save data to the pengumuman_rt table
        foreach ($request->input('rt') as $rtId) {
            DB::table('pengumuman_rt')->insert([
                'id_pengumuman' => $idPengumuman, // Use the saved id_pengumuman
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
    // Find the Pengumuman instance by its ID
    $pengumuman = Pengumuman::findOrFail($id);

    // Return the view with the Pengumuman instance
    return view('rt.rt_data_pengumuman.show', compact('pengumuman'));
}

/**
 * Show the form for editing the specified resource.
 */
public function edit(string $id)
{
    $type_menu = 'pengumuman';

    $id_rt = auth()->user()->id_rt;
    
    $rt = Rt::where('id_rt', $id_rt)->get();

    // Find the Pengumuman instance by its ID
    $pengumuman = Pengumuman::findOrFail($id);

    // Assuming you have a method to fetch all RTs, replace this with your actual implementation
   
    // echo $id_rt;
    






    

    // echo $rt;

    // Pass the Pengumuman instance and RTs to the view
    return view('rt.rt_data_pengumuman.edit', compact('pengumuman','rt','type_menu','id_rt'));


    // echo $id;
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
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

    // Find the Pengumuman instance by its ID
    $pengumuman = Pengumuman::findOrFail($id);

    // Update the Pengumuman instance with the new data
    $pengumuman->judul = $request->input('judul');
    $pengumuman->kepentingan = $request->input('kepentingan');
    $pengumuman->tanggal_pengumuman = $request->input('masa_berlaku');
    $pengumuman->isi_pengumuman = $request->input('isi_pengumuman');
    $pengumuman->nik = auth()->user()->nik;

    if ($request->hasFile('foto')) {
        $fileName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('rt_data_pengumuman'), $fileName);
        $pengumuman->foto = $fileName;
    }

    // Save the updated Pengumuman instance
    $pengumuman->save();

    // Update data in the pengumuman_rt table
    // $pengumuman->rt()->sync($request->input('rt'));

    return redirect()->route('rt_pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(string $id)
{
    // Find the Pengumuman instance by its ID
    $pengumuman = Pengumuman::findOrFail($id);

    // Delete the Pengumuman instance
    $pengumuman->delete();

    return redirect()->route('rt_pengumuman.index')->with('success', 'Pengumuman berhasil dihapus');
}
}