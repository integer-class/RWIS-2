<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk; // Kapitalisasi pada nama model
use App\Models\Pengumuman;
use App\Models\Pengumuman_rt;

class Warga_PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'pengumuman';

        $penduduk = Penduduk::where('nik', auth()->user()->nik)->first();
        if (!$penduduk) {
            return redirect()->route('error.page')->with('error', 'Data penduduk tidak ditemukan.');
        }

        // Mengambil pengumuman yang dibuat oleh penduduk
        $pengumuman = Pengumuman::join('penduduk', 'pengumuman.nik', '=', 'penduduk.nik')
            ->select('pengumuman.*', 'penduduk.nama')
            ->get();

        // Mengambil pengumuman berdasarkan RT
        $pengumuman_rtt = Pengumuman_rt::where('id_rt', $penduduk->id_rt)
            ->join('pengumuman', 'pengumuman_rt.id_pengumuman', '=', 'pengumuman.id_pengumuman')
            ->select('pengumuman.*')
            ->get();

        // Mengirim data ke view
        return view('warga.pengumuman.index', compact('type_menu', 'pengumuman', 'pengumuman_rtt'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementasi untuk menampilkan detail pengumuman
    }
}
