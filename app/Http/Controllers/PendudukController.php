<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Alert;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu = 'penduduk'; 
        if($request->has('search')){
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nama', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);
          }else{
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->paginate(10);
    }
         return view('rw.data_penduduk.index', compact('penduduk','type_menu'));
    }

    public function create()
    {
        $rt = \App\Models\Rt::all();
        $type_menu = 'penduduk'; 
        return view('rw.data_penduduk.tambah_penduduk', compact('rt','type_menu'));
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
                'id_rt' => $request->id_rt,
            ]);


            $user = User::create([
                'role' => $request->roles,
                'nik' => $request->nik,
                'id_rt' => $request->id_rt,
                'password' => $namaUpper . $request->tanggal_lahir,
            ]);

            

            Alert::success('Berhasil!', 'Berhasil menambahkan data!');
        
            return redirect()->back();
            

    }


    public function show(Penduduk $penduduk)
    {

        $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')

        ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
        ->where('penduduk.nik', $penduduk->nik)
        ->first();


        $jumlah_anggota_keluarga = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();


        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();




        $penduduk_kk = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)
        ->where('nik', '!=', $penduduk->nik) // Exclude the person
        ->get();


        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();

        




        $type_menu = 'detail_penduduk'; 
        return view('rw.data_penduduk.detail_penduduk', compact('penduduk','type_menu','penduduk_kk','jumlah_anggota_keluarga','komplain'));
        
    }

    
    public function edit(Penduduk $penduduk)
    {
        //
    }

    
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
