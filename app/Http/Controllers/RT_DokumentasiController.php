<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Models\Dokumentasi; 
use App\Models\Dokumentasi_foto;
//auth
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;
use App\Models\Penduduk;
use Alert;





class RT_DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dokumentasi';


        $nik = Penduduk::where('nik', Auth::user()->nik)->first();

        $id_rt = $nik->id_rt;

        $dokumentasi = Dokumentasi::where('nik', Auth::user()->nik)->get();

        return view('rt.rt_data_dokumentasi.index' , compact('type_menu','dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'dokumentasi';
        $images = Dokumentasi::all();

        return view('rt.rt_data_dokumentasi.create' , compact('type_menu','images'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);
    
        // Menyimpan file gambar
        // $filename = time() . '.' . $request->image->getClientOriginalExtension();
        // $path = $request->file('image')->storeAs('public/thumbnail', $filename);

        $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
        $path = $request->file('image')->move(public_path('thumbnail'), $imageName);


        
    
        // Periksa apakah file berhasil disimpan
        if ($path) {
            // Menyimpan data ke dalam database dan mendapatkan ID dari data yang baru disimpan
            $dokumentasi = Dokumentasi::create([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'deskripsi' => $request->keterangan,
                'tanggal' => $request->tanggal,
                'nik' => Auth::user()->nik,
                'thumbnail' => $imageName,
            ]);
    
            // Menampilkan alert sukses
            Alert::success('Berhasil!', 'Berhasil menambahkan data!');
    
            // Redirect ke halaman show dengan ID yang baru saja disimpan
            return redirect()->route('rt_dokumentasi.show',$dokumentasi->id_dokumentasi);

            // echo $dokumentasi->id_dokumentasi;
        } else {
            // Menampilkan alert gagal
            Alert::error('Gagal!', 'Gagal menyimpan file!');
    
            // Redirect kembali ke halaman form atau halaman lain yang sesuai
            return redirect()->route('rt_dokumentasi.create');
        }
    }
    


 public function storefoto(Request $request): JsonResponse
 {
    // Initialize an array to store image information
    $images = [];

    // Process each uploaded image
    foreach($request->file('files') as $image) {
        // Generate a unique name for the image
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
          
        // Move the image to the desired location
        $image->move(public_path('images'), $imageName);

        // Add image information to the array
        $images[] = [
            'name' => $imageName,
            'id_dokumentasi' => $request->id,
            'path' => asset('/images/'. $imageName),
            'filesize' => filesize(public_path('images/'.$imageName))
        ];
    }

    foreach ($images as $imageData) {
        Dokumentasi_foto::create($imageData);
    }
  return response()->json(['success' => true, 'message' => 'Images uploaded successfully.']);

}
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type_menu = 'dokumentasi';
        $dokumentasi = Dokumentasi::find($id);
        $images = Dokumentasi_foto::where('id_dokumentasi', $id)->get();

        return view('rt.rt_data_dokumentasi.create_photo' ,compact('type_menu','dokumentasi','id','images'));
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
        // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'kategori' => 'required|string|in:Keagamaan,Gotong Royong,Hajatan,Kegiatan Warga',
        'tanggal' => 'required|date',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Jika thumbnail diunggah, pastikan itu gambar dan memiliki ekstensi yang valid
        'keterangan' => 'nullable|string',
    ]);

    // Cari dokumen yang akan diperbarui
    $dokumentasi = Dokumentasi::findOrFail($id);

    // Simpan data yang diperbarui
    $dokumentasi->judul = $request->judul;
    $dokumentasi->kategori = $request->kategori;
    $dokumentasi->tanggal = $request->tanggal;
    $dokumentasi->deskripsi = $request->keterangan;

    // Handle thumbnail jika diunggah
    if ($request->hasFile('image')) {
        Storage::delete($dokumentasi->thumbnail);
    
        $imageName = $request->file('image')->getClientOriginalName();
        $thumbnailPath = $request->file('image')->move(public_path('thumbnail'), $imageName);
    
        $dokumentasi->thumbnail = $imageName;
    }

    $dokumentasi->save();


    Alert::error('Berhasil!', 'Berhasil Mengedit file!');
    
    // Redirect kembali ke halaman form atau halaman lain yang sesuai
    return redirect()->route('rt_dokumentasi.index');

    // Redirect atau berikan respons sukses
    // return redirect()->route('rw.data_dokumentasi.index')->with('success', 'Dokumentasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
