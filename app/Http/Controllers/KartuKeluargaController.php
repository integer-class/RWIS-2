<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Alert;
use App\Models\Penduduk;
use App\Models\Rt;


class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $kartukeluarga = \App\Models\KartuKeluarga::where('kepalakeluarga', 'LIKE', '%' . $request->search . '%')->paginate(8);
          }else{
               $kartukeluarga = \App\Models\KartuKeluarga::paginate(8);

             }
             $type_menu = 'kartu-keluarga'; 

             return view('rw.data_kartukeluarga.index', compact('kartukeluarga','type_menu'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rt = \App\Models\Rt::all();
        $type_menu = 'kartu-keluarga'; 
        return view('rw.data_kartukeluarga.tambah_kartukeluarga', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        KartuKeluarga::create([
            'nomor_kk' => $request->nomor_kk,
            'kepalakeluarga' => $request->kepalakeluarga,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
           
        ]);
        Alert::success('Berhasil!', 'Berhasil menambahkan data!');
        
        return redirect()->back();

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 
    
    $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->first();
    $penduduk = Penduduk::where('nomor_kk', $nomor_kk)->get();

    // Pass the fetched record to the view
    return view('rw.data_kartukeluarga.detail', compact('kartuKeluarga', 'type_menu', 'penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 

    // Retrieve the Penduduk record by NIK
    $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
    
    
    // Retrieve all Kartu Keluarga records
    $kartukeluarga = KartuKeluarga::all();
    
    // Return the edit view with the retrieved data
    return view('rw.data_kartukeluarga.edit_kartukeluarga', compact('kartuKeluarga','type_menu'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, KartuKeluarga $kartuKeluarga)
        {
            // Validasi data yang diterima dari form
            $request->validate([
                'nomor_kk' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'kepalakeluarga' => 'required|string|max:255',
                'rt' => 'required|string|max:10',
                'rw' => 'required|string|max:10',
                'kelurahan' => 'required|string|max:255',
                'kecamatan' => 'required|string|max:255',
                'kabupaten' => 'required|string|max:255',
                'provinsi' => 'required|string|max:255',
                'kewarganegaraan' => 'required|string|max:255',
            ]);
        
            // Memperbarui data KartuKeluarga di database
            $kartuKeluarga->update([
                'nomor_kk' => $request->input('nomor_kk'),
                'alamat' => $request->input('alamat'),
                'kepalakeluarga' => $request->input('kepalakeluarga'),
                'rt' => $request->input('rt'),
                'rw' => $request->input('rw'),
                'kelurahan' => $request->input('kelurahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kabupaten' => $request->input('kabupaten'),
                'provinsi' => $request->input('provinsi'),
                'kewarganegaraan' => $request->input('kewarganegaraan'),
            ]);
        
            // Redirect ke route yang diinginkan dengan pesan sukses
            return redirect()->route('rw.data_kartukeluarga.index')->with('success', 'Kartu Keluarga updated successfully.');
        }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    // Find the KartuKeluarga record by its primary key (nomor_kk)
    $kartuKeluarga = KartuKeluarga::findOrFail($id);

    // Delete the record
    $kartuKeluarga->delete();

    // Redirect to a desired route with a success message
    return redirect()->route('rw.data_kartukeluarga.index')->with('success', 'Kartu Keluarga deleted successfully.', 'type_menu');
}

        
    }

