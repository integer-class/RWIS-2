<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Alert;
use Carbon\Carbon;

use App\Models\Penduduk;
use App\Models\Rt;

use Illuminate\Database\Eloquent\Model;


class KartuKeluargaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kartukeluarga = KartuKeluarga::where('kepalakeluarga', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $kartukeluarga = KartuKeluarga::paginate(10);
        }
        $type_menu = 'kartu-keluarga'; 
        return view('rw.data_kartukeluarga.index', compact('kartukeluarga', 'type_menu'));
    }

    public function create()
    {
        $rt = Rt::all();
        $type_menu = 'kartu-keluarga'; 
        return view('rw.data_kartukeluarga.tambah_kartukeluarga', compact('type_menu'));
    }

    public function store(Request $request)
    {

        //exist nomor kk
        $existingKartuKeluarga = KartuKeluarga::where('nomor_kk', $request->nomor_kk)->first();
        if($existingKartuKeluarga){
            Alert::error('Data Duplikasi', 'Nomor KK Telah Terdaftar!');
            return redirect()->back();
        }
        else {
            KartuKeluarga::create([
                'nomor_kk' => $request->nomor_kk,
                'kepalakeluarga' => $request->kepalakeluarga,
                'alamat' => $request->alamat,
                'rt' => $request->rt,
                'rw' => $request->rw,
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                'provinsi' => $request->provinsi,
            ]);
            Alert::success('Berhasil!', 'Berhasil menambahkan data!');
            return redirect()->back();
        }
       
    }

    public function show(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->first();
        $penduduk = Penduduk::where('nomor_kk', $nomor_kk)->get();

        //hitung umur

         foreach ($penduduk as $orang) {
        $tanggal_lahir = Carbon::parse($orang->tanggal_lahir);
        $orang->umur = $tanggal_lahir->age;
    }

    return view('rw.data_kartukeluarga.detail', compact('kartuKeluarga', 'type_menu', 'penduduk'));
    }

    public function edit(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        return view('rw.data_kartukeluarga.edit_kartukeluarga', compact('kartuKeluarga', 'type_menu'));
    }
    public function update(Request $request)
    {
        //exist nomor kk
        $existingKartuKeluarga = KartuKeluarga::where('nomor_kk', $request->nomor_kk)->first();

        if ($existingKartuKeluarga) {
            Alert::error('Data Duplikasi', 'Nomor KK Telah Terdaftar!');
            return redirect()->back();
        } else {
            $kartuKeluarga->update([
                'nomor_kk' => $request->input('nomor_kk'),
                'kepalakeluarga' => $request->input('kepalakeluarga'),
                'rt' => $request->input('rt'),
                'rw' => $request->input('rw'),
                'kelurahan' => $request->input('kelurahan'),
                'kecamatan' => $request->input('kecamatan'),
                'kabupaten' => $request->input('kabupaten'),
                'provinsi' => $request->input('provinsi'),
                'alamat' => $request->input('alamat'),
            ]);
    
    
            // dd($nomor_kk);
    
            // echo $nomor_kk;
    
            Alert::success('Berhasil!', 'Berhasil Megedit data!');
            return redirect()->back();
        }

        
        // Update data Kartu Keluarga
       
       




    }
    
    
    

    public function destroy(string $nomor_kk)
    {
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        $kartuKeluarga->delete();
        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga deleted successfully.');
    }

}

