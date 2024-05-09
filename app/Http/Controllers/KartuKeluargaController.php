<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;

class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $kartukeluarga = \App\Models\KartuKeluarga::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(8);
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
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten,
            'provinsi' => $request->provinsi,
           
        ]);
        return redirect()->route('kartu-keluarga.index')->with('success', 'Data Berhasil Ditambahkan');

        
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
