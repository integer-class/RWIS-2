<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use Illuminate\Support\Facades\Auth;
use App\Models\Dokumentasi;

class Warga_DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dokumentasi';

        $nik = Penduduk::where('nik', Auth::user()->nik)->first();

        $id_rt = $nik->id_rt;

        $dokumentasi = Dokumentasi::where('nik', Auth::user()->nik)->get();

        return view('warga.dokumentasi.index' , compact('type_menu','dokumentasi'));
    }

   
    public function show(string $id)
    {
        //
    }
}
