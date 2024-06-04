<?php

namespace App\Http\Controllers;

//model
use App\Models\KartuKeluarga;
//penduduk
use App\Models\Penduduk;
//rt
use App\Models\Rt;
//dokuemntasi
use App\Models\Dokumentasi;




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
        $dokumentasi = Dokumentasi::all()
        ->take(6)
        ->sortByDesc('created_at');

        $hari = [];
        foreach ($dokumentasi as $doc) {
            $hari[] = date('l', strtotime($doc->tanggal));
        }



        return view('landing.index', compact('kartukeluarga','penduduk','rt','dokumentasi','hari'));
        
    }

    public function dokumentasi()
    {

        $dokumentasi = Dokumentasi::all();
        // Your logic here
        return view('landing.dokumentasi', compact('dokumentasi'));
    }

    public function aboutus()
    {

        // $dokumentasi = Dokumentasi::all();
        // Your logic here
        return view('landing.aboutus');
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
