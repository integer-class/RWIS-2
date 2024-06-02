<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
//iuran
use App\Models\Iuran;
use App\Models\Komplain;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dashboard';

       //bagian hitung
        $penduduk = Penduduk::all()
        ->count();

        $jumlah_laki = Penduduk::where('jenis_kelamin', 'L')
            ->count();
        $jumlah_perempuan = Penduduk::where('jenis_kelamin', 'P')
            ->count();
            

        $kartu_keluarga = KartuKeluarga::all()
            ->count();

        $totalSemuaPemasukan = Iuran::where('status', 'pemasukan')->sum('jumlah');
        $totalSemuaPengeluaran = Iuran::where('status', 'pengeluaran')->sum('jumlah');

        $jumlah_kas = $totalSemuaPemasukan - $totalSemuaPengeluaran;


        //bagian data

        $komplain = Komplain::join('penduduk', 'komplain.nik', '=', 'penduduk.nik')
        ->take(5)
        ->get();



        

        return view ('rw.index', compact('type_menu', 'penduduk', 'jumlah_kas', 'kartu_keluarga', 'komplain', 'jumlah_laki', 'jumlah_perempuan'));
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
