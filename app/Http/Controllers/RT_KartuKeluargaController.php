<?php

namespace App\Http\Controllers;

use App\Models\KartuKeluarga;
use Illuminate\Http\Request;
use Alert;

class RT_KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $type_menu = 'kartu-keluarga';

        $kartukeluarga = KartuKeluarga::all();


        return view('rt.rt_data_kartukeluarga.index', compact('type_menu', 'kartukeluarga'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'kartu-keluarga';
        return view('rt.rt_data_kartukeluarga.create', compact('type_menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //exist nomor kk
        $existingKartuKeluarga = KartuKeluarga::where('nomor_kk', $request->nomor_kk)->first();
        if($existingKartuKeluarga){
            Alert::error('Data Duplikasi', 'Nomor KK Telah Terdaftar!');
            return redirect()->back();
        }
        else {
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
    }

    /**
     * Display the specified resource.
     */
    public function show(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KartuKeluarga $kartuKeluarga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KartuKeluarga $kartuKeluarga)
    {
        //
    }
}
