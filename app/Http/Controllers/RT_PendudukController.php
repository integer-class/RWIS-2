<?php

namespace App\Http\Controllers;


use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\User;
use App\Models\Komplain;

use Alert;


use Illuminate\Http\Request;

class RT_PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {

         $type_menu = 'penduduk'; 
        if($request->has('search')){
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nama', 'LIKE', '%' . $request->search . '%')
            ->where('users.id_rt', auth()->user()->id_rt)
            ->paginate(10);
          }else{
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('users.id_rt', auth()->user()->id_rt)
            ->paginate(10);
          }


        return view('rt.rt_data_penduduk.index', compact('penduduk', 'type_menu'));

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'penduduk';

        $rt = \App\Models\Rt::where('id_rt', auth()->user()->id_rt)->get();

        $kartukeluarga = \App\Models\KartuKeluarga::all();
        
        return view('rt.rt_data_penduduk.create', compact('rt', 'type_menu', 'kartukeluarga'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nama = $request->nama;
        $nomor_kk = $request->nomor_kk;
        $pieces = explode(" - ", $nomor_kk);
        $nomor_kk = $pieces[0];


        $namaArray = explode(' ', $nama);
        $namaDepan = ucfirst($namaArray[0]);
        $namaUpper = strtoupper($namaDepan);
        
            Penduduk::create([
                'nik' => $request->nik,
                'nomor_kk' => $nomor_kk,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
                'status_perkawinan' => $request->status_perkawinan,
                'status_hubungan' => $request->status_hubungan,
                'kewarganegaraan' => $request->kewarganegaraan,
                'id_rt' => $request->id_rt,
                'foto' => 'default.png', 
                'alamat' => $request->alamat,
                'status' => '1',
            ]);

            User::create([
                'nik' => $request->nik,
                'password' => bcrypt($request->nik),
                'role' => '3',
                'id_rt' => $request->id_rt,
            ]);

            Alert::success('Berhasil', 'Data Penduduk Berhasil Ditambahkan');
            return redirect()->route('rt_penduduk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $penduduk)
    {

        $penduduk = Penduduk::where('nik', $penduduk)->first();
        $kartukeluarga = KartuKeluarga::where('nomor_kk', $penduduk->nomor_kk)->first();
        $penduduk_kk = Penduduk::where('nomor_kk', $penduduk->nomor_kk)->get();
        $user = User::where('nik', $penduduk->nik)->first();
        $type_menu = 'penduduk'; 

        $komplain = Komplain::where('nik', $penduduk->nik)->count();
        $jumlah_anggota_keluarga = Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();
        

        return view('rt.rt_data_penduduk.detail_penduduk', compact('penduduk', 'kartukeluarga', 'user', 'type_menu', 'komplain', 'jumlah_anggota_keluarga', 'penduduk_kk'));


        // echo $penduduk->nomor_kk;


        echo json_encode(array('penduduk' => $penduduk, 'kartukeluarga' => $kartukeluarga, 'user' => $user, 'type_menu' => $type_menu));

      



        

       
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nik)
    {

    $type_menu = 'penduduk'; 

    // Retrieve the Penduduk record by NIK
    $penduduk = Penduduk::where('nik', $nik)->firstOrFail();
    
    // // Retrieve all RT records
    // $rt = Rt::all();
    
    // Retrieve all Kartu Keluarga records
    $kartukeluarga = KartuKeluarga::all();
    
    // Return the edit view with the retrieved data
    return view('rt.rt_data_penduduk.rt_penduduk_edit', compact('penduduk', 'kartukeluarga','type_menu'));
    

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        // Validasi data yang diterima dari form
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu', 
        'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai',
        'golongan_darah' => 'required|in:A,B,AB,O',
        'id_rt' => 'required|exists:rt,id_rt',
        'pekerjaan' => 'required|string|max:255',
        'nomor_kk' => 'required|string|max:255',
        'status' => 'required|in:hidup,meninggal,pindah',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Memperbarui data penduduk di database
    $penduduk->update([
        'nama' => $request->input('nama'),
        'alamat' => $request->input('alamat'),
        'tanggal_lahir' => $request->input('tanggal_lahir'),
        'jenis_kelamin' => $request->input('jenis_kelamin'),
        'agama' => $request->input('agama'),
        'status_perkawinan' => $request->input('status_perkawinan'),
        'golongan_darah' => $request->input('golongan_darah'),
        'id_rt' => $request->input('id_rt'),
        'pekerjaan' => $request->input('pekerjaan'),
        'nomor_kk' => $request->input('nomor_kk'),
        'status' => strtolower($request->input('status')),
    ]);

    // Optional: Upload foto jika diunggah
    if ($request->hasFile('foto')) {
        $fotoName = $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('fotos', $fotoName, 'public');
        $penduduk->foto = $fotoName;
        $penduduk->save();
        
    }
    

    // Mengirimkan respon atau mengarahkan kembali ke halaman yang sesuai dengan pesan sukses
    return redirect()->route('penduduk.index')->with('success', 'Data penduduk berhasil diperbarui.');
}

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        //
    }
}
