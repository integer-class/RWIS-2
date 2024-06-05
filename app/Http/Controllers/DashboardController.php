<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use Illuminate\Support\Facades\DB;
//iuran
use App\Models\Iuran;
use App\Models\Komplain;
use DateTime;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $type_menu = 'dashboard';

    // Bagian hitung
    $penduduk = Penduduk::count();
    $jumlah_laki = Penduduk::where('jenis_kelamin', 'L')->count();
    $jumlah_perempuan = Penduduk::where('jenis_kelamin', 'P')->count();
    $kartu_keluarga = KartuKeluarga::count();
    $totalSemuaPemasukan = Iuran::where('status', 'pemasukan')->sum('jumlah');
    $totalSemuaPengeluaran = Iuran::where('status', 'pengeluaran')->sum('jumlah');
    $jumlah_kas = $totalSemuaPemasukan - $totalSemuaPengeluaran;

    // Bagian data
    $komplain = Komplain::join('penduduk', 'komplain.nik', '=', 'penduduk.nik')
        ->take(8)
        ->get();

    // Data iuran perbulan
    $iuran_bulanan = Iuran::where('status', 'pemasukan')
        ->select(DB::raw('SUM(jumlah) as total'), DB::raw('MONTH(tanggal) as bulan'))
        ->groupBy(DB::raw('MONTH(tanggal)'))
        ->get();

    // Array nama bulan
    $nama_bulan = [];
    for ($i = 1; $i <= 12; $i++) {
        $nama_bulan[$i] = DateTime::createFromFormat('!m', $i)->format('F');
    }

    // Hitung usia setiap penduduk
    $usia_penduduk = Penduduk::selectRaw('TIMESTAMPDIFF(YEAR, tanggal_lahir, CURDATE()) AS usia')->get();

    // Kelompokkan penduduk berdasarkan usia
    $kategori_usia = [
        'Anak-anak' => 0,
        'Remaja' => 0,
        'Dewasa' => 0,
        'Lansia' => 0
    ];

    foreach ($usia_penduduk as $orang) {
        if ($orang->usia <= 12) {
            $kategori_usia['Anak-anak']++;
        } elseif ($orang->usia <= 18) {
            $kategori_usia['Remaja']++;
        } elseif ($orang->usia <= 60) {
            $kategori_usia['Dewasa']++;
        } else {
            $kategori_usia['Lansia']++;
        }
    }

    // Data untuk grafik batang
    $labels_usia = array_keys($kategori_usia);
    $data_usia = array_values($kategori_usia);

    return view('rw.index', compact('type_menu', 'penduduk', 'jumlah_kas', 'kartu_keluarga', 'komplain', 'jumlah_laki', 'jumlah_perempuan', 'iuran_bulanan', 'nama_bulan', 'labels_usia', 'data_usia'));
}


public function profile($id)
    {

        $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nik', $id)
            ->first();

          
        $jumlah_anggota_keluarga = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();
        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();
        $penduduk_kk = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)
            ->where('nik', '!=', $penduduk->nik) 
            ->get();
        $type_menu = 'detail_penduduk'; 
        return view('rw.profile', compact('penduduk', 'type_menu', 'penduduk_kk', 'jumlah_anggota_keluarga', 'komplain'));
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
    public function show($id)
    {
        
        echo $id;
        $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nik', $id)
            ->first();

          
        $jumlah_anggota_keluarga = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();
        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();
        $penduduk_kk = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)
            ->where('nik', '!=', $penduduk->nik) 
            ->get();
        $type_menu = 'detail_penduduk'; 
        return view('rw.show', compact('penduduk', 'type_menu', 'penduduk_kk', 'jumlah_anggota_keluarga', 'komplain'));
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
