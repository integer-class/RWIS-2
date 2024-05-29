<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Alert;
use App\Models\Penduduk;
use App\Models\Rt;

class KartuKeluargaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $kartukeluarga = KartuKeluarga::where('kepalakeluarga', 'LIKE', '%' . $request->search . '%')->paginate(8);
        } else {
            $kartukeluarga = KartuKeluarga::paginate(8);
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

    public function show(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->first();
        $penduduk = Penduduk::where('nomor_kk', $nomor_kk)->get();
        return view('rw.data_kartukeluarga.detail', compact('kartuKeluarga', 'type_menu', 'penduduk'));
    }

    public function edit(string $nomor_kk)
    {
        $type_menu = 'kartu-keluarga'; 
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        return view('rw.data_kartukeluarga.edit_kartukeluarga', compact('kartuKeluarga', 'type_menu'));
    }

    public function update(Request $request, string $nomor_kk)
    {
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        $validatedData = $request->validate([
            'nomor_kk' => 'required|numeric',
            'kepalakeluarga' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kelurahan' => 'required|string',
            'kecamatan' => 'required|string',
            'kabupaten' => 'required|string',
            'provinsi' => 'required|string',
            'alamat' => 'required|string',
        ]);
        $kartuKeluarga->update($validatedData);
        return redirect()->route('kartu-keluarga.index')->with('success', 'Data berhasil diupdate');
    }
    
    public function destroy(string $nomor_kk)
    {
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        $kartuKeluarga->delete();
        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga deleted successfully.');
    }
}
