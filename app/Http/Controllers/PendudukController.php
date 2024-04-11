<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;

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
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->paginate(8);
             }

             $type_menu = 'penduduk'; 

         return view('rw.data_penduduk.index', compact('penduduk','type_menu'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rt = \App\Models\Rt::all();
        //.

        return view('rw.data_penduduk.tambah_penduduk', compact('rt'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    
    $nama = $request->nama;
    $namaArray = explode(' ', $nama);
    $namaDepan = ucfirst($namaArray[0]);
    $namaUpper = strtoupper($namaDepan);
    

    


        Penduduk::create([
            'nik' => $request->nik,
            'nomor_kk' => $request->nomor_kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'golongan_darah' => $request->golongan_darah,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
        ]);


        $user = User::create([
            'name' => $namaUpper,
            'role' => $request->roles,
            'nik' => $request->nik,
            'id_rt' => $request->id_rt,
            'password' => $namaUpper . $request->tanggal_lahir,
            
        ]);

        return redirect()->route('penduduk.index')->with('success', 'Data Berhasil Ditambahkan');

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
