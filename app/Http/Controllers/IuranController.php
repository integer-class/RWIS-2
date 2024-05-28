<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Iuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class IuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

    $type_menu = 'iuran';


        $bulan = $request->input('bulan', date('m')); // Default to current month if not provided
        $tahun = $request->input('tahun', date('Y')); 

        $iuran = Iuran::join('kartu_keluarga', 'iuran.nomor_kk', '=', 'kartu_keluarga.nomor_kk')->get();

        // $iuran = Iuran::all();


        
        
        return view ('rw.data_iuran.index',compact('bulan','tahun','type_menu','iuran'));

        // return json_encode($iuran);
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
