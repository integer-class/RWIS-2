<?php

namespace App\Http\Controllers;


use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\User;
use App\Models\Komplain;

use Alert;


use Illuminate\Http\Request;

class RT_PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {

         $type_menu = 'penduduk'; 
        if($request->has('search')){
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nama', 'LIKE', '%' . $request->search . '%')
            ->where('users.id_rt', auth()->user()->id_rt)
            ->paginate(10);
          }else{
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('users.id_rt', auth()->user()->id_rt)
            ->paginate(10);
          }


        return view('rt.rt_data_penduduk.index', compact('penduduk', 'type_menu'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $penduduk)
    {

        $penduduk = Penduduk::where('nik', $penduduk)->first();
        $kartukeluarga = KartuKeluarga::where('nomor_kk', $penduduk->nomor_kk)->first();
        $penduduk_kk = Penduduk::where('nomor_kk', $penduduk->nomor_kk)->get();
        $user = User::where('nik', $penduduk->nik)->first();
        $type_menu = 'penduduk'; 

        $komplain = Komplain::where('nik', $penduduk->nik)->count();
        $jumlah_anggota_keluarga = Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();
        

        return view('rt.rt_data_penduduk.detail_penduduk', compact('penduduk', 'kartukeluarga', 'user', 'type_menu', 'komplain', 'jumlah_anggota_keluarga', 'penduduk_kk'));


        // echo json_encode(array('penduduk' => $penduduk, 'kartukeluarga' => $kartukeluarga, 'user' => $user, 'type_menu' => $type_menu));

      



        

       
        
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
