<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;    
use App\Models\Pengumuman_rt;
use App\Models\User;
use Alert;

class Warga_DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dashboard';

        $penduduk = Penduduk::where('nik', auth()->user()->nik)->first();
        if (!$penduduk) {
            return redirect()->route('error.page')->with('error', 'Data penduduk tidak ditemukan.');
        }
    
        $pengumuman_rt = Pengumuman_rt::where('id_rt', $penduduk->id_rt)
            ->join('pengumuman', 'pengumuman_rt.id_pengumuman', '=', 'pengumuman.id_pengumuman')
            ->select('pengumuman.*')
            ->first();
    
        if ($pengumuman_rt) {
            $tanggal_pengumuman = $pengumuman_rt->tanggal; 
        } 
        else {
            $tanggal_pengumuman = null;
        }
        $tanggal_sekarang = date('Y-m-d');
    
        $password_default = auth()->user()->default_password;


        $pengumuman_rtt = Pengumuman_rt::where('id_rt', $penduduk->id_rt)
    ->join('pengumuman', 'pengumuman_rt.id_pengumuman', '=', 'pengumuman.id_pengumuman')
    ->select('pengumuman.*')
    ->get();







        
        
        return view('warga.index', compact('type_menu', 'penduduk', 'password_default', 'pengumuman_rt', 'tanggal_sekarang', 'tanggal_pengumuman','pengumuman_rtt'));
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

     //show ver 1
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
        return view('warga.show', compact('penduduk', 'type_menu', 'penduduk_kk', 'jumlah_anggota_keluarga', 'komplain'));
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
    public function update(Request $request, string $nik)
    {
        $penduduk = Penduduk::where('nik', $nik)->first();


        if ($request->has('password')) {
            $user = User::where('nik', $penduduk->nik)->first();
            $user->update([
                'password' => bcrypt($request->password),
                'default_password' => 'no', 
            ]);
        }
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('penduduk'), $imageName);
            $penduduk->update(['foto' => $imageName]);
        }

        Alert::success('Berhasil!', 'Berhasil menambahkan data!');
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
