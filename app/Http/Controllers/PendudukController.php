<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Alert;
use App\Models\KartuKeluarga;
use App\Models\Rt;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu = 'penduduk'; 
        if($request->has('search')){
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->where('penduduk.nama', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);
          }else{
            $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')
            ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
            ->paginate(10);
    }
         return view('rw.data_penduduk.index', compact('penduduk','type_menu'));
    }

    public function create()
    {
        $rt = \App\Models\Rt::all();
        $kartukeluarga = \App\Models\KartuKeluarga::all();
        $type_menu = 'penduduk'; 


        return view('rw.data_penduduk.tambah_penduduk', compact('rt','type_menu','kartukeluarga'));
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
                'nomor_kk' => $request->nomor_kk,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'golongan_darah' => $request->golongan_darah,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'pekerjaan' => $request->pekerjaan,
                'id_rt' => $request->id_rt,
                'foto' => 'default.png',
            ]);


            $user = User::create([
                'role' => $request->roles,
                'nik' => $request->nik,
                'id_rt' => $request->id_rt,
                'password' => $namaUpper . $request->tanggal_lahir,
                'default_password' => 'yes',
            ]);

            

            Alert::success('Berhasil!', 'Berhasil menambahkan data!');
        
            return redirect()->back();
            

    }


    public function show(Penduduk $penduduk)
    {

        $penduduk = \App\Models\Penduduk::join('users', 'penduduk.nik', '=', 'users.nik')

        ->join('rt', 'users.id_rt', '=', 'rt.id_rt')
        ->where('penduduk.nik', $penduduk->nik)
        ->first();


        $jumlah_anggota_keluarga = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)->count();


        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();




        $penduduk_kk = \App\Models\Penduduk::where('nomor_kk', $penduduk->nomor_kk)
        ->where('nik', '!=', $penduduk->nik) // Exclude the person
        ->get();


        $komplain = \App\Models\Komplain::where('nik', $penduduk->nik)->count();

        




        $type_menu = 'detail_penduduk'; 
        return view('rw.data_penduduk.detail_penduduk', compact('penduduk','type_menu','penduduk_kk','jumlah_anggota_keluarga','komplain'));
        
    }

    
    // public function edit(Penduduk $penduduk)
    // {
    //     return view('rw.data_penduduk.penduduk_edit', compact('penduduk'));

    // }

    public function edit($nik)
    {
    $type_menu = 'penduduk'; 

    // Retrieve the Penduduk record by NIK
    $penduduk = Penduduk::where('nik', $nik)->firstOrFail();
    
    // Retrieve all RT records
    $rt = Rt::all();
    
    // Retrieve all Kartu Keluarga records
    $kartukeluarga = KartuKeluarga::all();
    
    // Return the edit view with the retrieved data
    return view('rw.data_penduduk.penduduk_edit', compact('penduduk', 'rt', 'kartukeluarga','type_menu'));
}


    
public function update(Request $request, Penduduk $penduduk)
{
    // Validasi data yang diterima dari form
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu', // Sesuaikan dengan opsi agama yang tersedia
        'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai', // Sesuaikan dengan opsi status perkawinan yang tersedia
        'golongan_darah' => 'required|in:A,B,AB,O', // Sesuaikan dengan opsi golongan darah yang tersedia
        'id_rt' => 'required|exists:rt,id_rt', // Pastikan RT yang dipilih ada dalam database
        'pekerjaan' => 'required|string|max:255',
        'nomor_kk' => 'required|string|max:255',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional: Validasi foto jika diunggah
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
    public function destroy($id)
{
    // Temukan penduduk berdasarkan ID
    $penduduk = Penduduk::findOrFail($id);
    
    // Hapus penduduk dari database
    $penduduk->delete();
    
    // Redirect kembali ke halaman index dengan pesan sukses
    return redirect()->route('penduduk.index')->with('success', 'Penduduk berhasil dihapus');
}

    
}
