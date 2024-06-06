<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;


class BansosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'bansos';
    
        $kartu_keluarga = KartuKeluarga::all();
    
        // Melakukan perhitungan skor untuk setiap kartu keluarga
        $skor_kartu_keluarga = [];
        foreach ($kartu_keluarga as $kk) {
            $skor_agregat_kk = $this->hitungSkorKartuKeluarga($kk);
            $skor_kartu_keluarga[$kk->nomor_kk] = $skor_agregat_kk;
        }
    
        // Uncomment the following line if you need to debug the $skor_kartu_keluarga
        // dd($skor_kartu_keluarga);
    
        return view('rw.data_bansos.index', compact('type_menu', 'kartu_keluarga', 'skor_kartu_keluarga'));
    }

    private function hitungSkorKartuKeluarga($kk)
    {
        $skor_agregat_kk = 0;

        // Mendapatkan semua anggota keluarga terkait dengan kartu keluarga
        $anggota_keluarga = $kk->penduduk;

        // Melakukan perhitungan skor untuk setiap anggota keluarga yang masih hidup dan tidak pindah
        foreach ($anggota_keluarga as $anggota) {
            if ($anggota->status !== 'meninggal' && $anggota->status !== 'pindah') {
                // Melakukan perhitungan skor individu untuk setiap anggota keluarga
                $skor_agregat_kk += $this->hitungSkorIndividu($anggota);
            }
        }

        return $skor_agregat_kk;
    }

    // Fungsi untuk menghitung skor individu untuk setiap anggota keluarga
    private function hitungSkorIndividu($anggota)
    {
        // Lakukan perhitungan skor individu sesuai dengan atribut yang dibutuhkan
        $skor_agregat = $anggota->pendapatan * 0.2 + // Pendapatan
                        $anggota->jumlah_anggota * 0.1 + // Jumlah anggota keluarga
                        $this->hitungStatusSosialSkor($anggota->status_sosial) * 0.1 + // Status sosial
                        $this->hitungUsiaSkor($anggota->tanggal_lahir) * 0.2 + // Usia
                        $this->hitungPekerjaanSkor($anggota->pekerjaan) * 0.2 + // Pekerjaan
                        $this->hitungStatusKesehatanSkor($anggota->status_kesehatan) * 0.2; // Status kesehatan

        return $skor_agregat;
    }

    // Fungsi untuk menghitung skor status sosial
    private function hitungStatusSosialSkor($status_sosial)
    {
        switch ($status_sosial) {
            case 'janda':
            case 'duda':
                return 1;
            case 'yatim':
            case 'piatu':
                return 0.5;
            default:
                return 0;
        }
    }

    // Fungsi untuk menghitung skor usia
    private function hitungUsiaSkor($tanggal_lahir)
    {
        // Hitung usia berdasarkan tanggal lahir
        $usia = now()->diffInYears($tanggal_lahir);

        // Tentukan skor berdasarkan usia
        if ($usia < 17) {
            return 1;
        } elseif ($usia >= 17 && $usia < 60) {
            return 0.5;
        } else {
            return 0.25;
        }
    }

    // Fungsi untuk menghitung skor pekerjaan
    private function hitungPekerjaanSkor($pekerjaan)
    {
        return $pekerjaan == 'Tidak Bekerja' ? 1 : 0;
    }

    // Fungsi untuk menghitung skor status kesehatan
    private function hitungStatusKesehatanSkor($status_kesehatan)
    {
        return $status_kesehatan == 'sehat' ? 1 : 0;
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
