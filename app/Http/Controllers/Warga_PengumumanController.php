<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengumuman;

class Warga_PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'pengumuman';

        $pengumuman = Pengumuman::join('penduduk', 'pengumuman.nik', '=', 'penduduk.nik')
            ->select('pengumuman.*', 'penduduk.nama')
            ->get();
        return view('warga.pengumuman.index', compact('type_menu', 'pengumuman'));
    }

    
    public function show(string $id)
    {
        //
    }
}
