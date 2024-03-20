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
        //
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
