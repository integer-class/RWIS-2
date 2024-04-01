<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $penduduk = \App\Models\Penduduk::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(8);
          }else{
               $penduduk = \App\Models\Penduduk::paginate(8);
             }


         return view('rw.data_penduduk.index', compact('penduduk'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rw.data_penduduk.tambah_penduduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    


    // $request->validate([
    //     'nik' => 'required|size:16|unique:penduduk',
    //     'nomor_kk' => 'required',
    //     'nama' => 'required',
    //     'tempat_lahir' => 'required',
    //     'tanggal_lahir' => 'required',
    //     'jenis_kelamin' => 'required',
    //     'golongan_darah' => 'required',
    //     'alamat' => 'required',
    //     'agama' => 'required',
    //     'status_perkawinan' => 'required',
    //     'pekerjaan' => 'required',
    // ]);

    $penduduk = new Penduduk;
    $penduduk->nik = $request->nik;
    $penduduk->nomor_kk = $request->nomor_kk;
    $penduduk->nama = $request->nama;
    $penduduk->tanggal_lahir = $request->tanggal_lahir;
    $penduduk->jenis_kelamin = $request->jenis_kelamin;
    $penduduk->golongan_darah = $request->golongan_darah;
    $penduduk->alamat = $request->alamat;
    $penduduk->agama = $request->agama;
    $penduduk->status_perkawinan = $request->status_perkawinan;
    $penduduk->pekerjaan = $request->pekerjaan;

    echo $penduduk;

    // $penduduk->save();
}


    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
