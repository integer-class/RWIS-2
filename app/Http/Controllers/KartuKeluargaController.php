<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KartuKeluarga;
use Alert;
use App\Models\Penduduk;
use App\Models\Rt;
use Illuminate\Database\Eloquent\Model;


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

    public function update(Request $request, $nomor_kk, Penduduk $penduduk)
    {
        // Validasi data sebelum update
        $request->validate([
            'nomor_kk' => 'required|numeric',
            'kepalakeluarga' => 'required|string|max:255',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

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
    

        // Cari record berdasarkan primary key `nomor_kk`
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();

        // Update data
        $kartuKeluarga->update($request->all());

        return redirect()->route('kartu-keluarga.index')->with('success', 'Data updated successfully');
    }

    public function destroy(string $nomor_kk)
    {
        $kartuKeluarga = KartuKeluarga::where('nomor_kk', $nomor_kk)->firstOrFail();
        $kartuKeluarga->delete();
        return redirect()->route('kartu-keluarga.index')->with('success', 'Kartu Keluarga deleted successfully.');
    }
}
