<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Pengumuman;
use App\Models\Dokumentasi;



class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $type_menu = 'arsip';
        $penduduk = Penduduk::join('rt', 'penduduk.id_rt', '=', 'rt.id_rt')
        ->where('penduduk.arsip', 'true')
        ->where(function($query) {
         $query->where('penduduk.status', 'meninggal')
                ->orWhere('penduduk.arsip', 'true')
                  ->orWhere('penduduk.status', 'pindah');
        })
        ->get();

        $pengumuman = Pengumuman::all()
            ->where('arsip', 'true');

        $dokumentasi = Dokumentasi::all()
            ->where('arsip', 'true');
            

        
        return view('rw.data_arsip.index', compact('type_menu','penduduk','pengumuman','dokumentasi'));
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
