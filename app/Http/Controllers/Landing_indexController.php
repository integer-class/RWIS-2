<?php

namespace App\Http\Controllers;

//model
use App\Models\KartuKeluarga;
//penduduk
use App\Models\Penduduk;
//rt
use App\Models\Rt;



use Illuminate\Http\Request;

class Landing_indexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       //hitung kk
        $kartukeluarga = KartuKeluarga::count();
        $penduduk = Penduduk::count();
        $rt = Rt::count();
        


        return view('landing.index', compact('kartukeluarga','penduduk'));
        
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
