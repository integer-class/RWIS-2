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
use Alert;





class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dokumentasi';

        $dokumentasi = Dokumentasi::all();


        // Menampilkan data dari table dokumentasi



        return view('rw.data_dokumentasi.index' , compact('type_menu','dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type_menu = 'dokumentasi';
        $images = Dokumentasi::all();

        return view('rw.data_dokumentasi.create' , compact('type_menu','images'));
        
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
            'keterangan' => 'required|string|max:255',
        ]);
    
        // Menyimpan file gambar
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $path = $request->file('image')->storeAs('public/thumbnail', $filename);
    
        // Periksa apakah file berhasil disimpan
        if ($path) {
            // Menyimpan data ke dalam database dan mendapatkan ID dari data yang baru disimpan
            $dokumentasi = Dokumentasi::create([
                'kategori' => $request->kategori,
                'judul' => $request->judul,
                'deskripsi' => $request->keterangan,
                'nik' => Auth::user()->nik,
                'thumbnail' => $filename,
            ]);
    
            // Menampilkan alert sukses
            Alert::success('Berhasil!', 'Berhasil menambahkan data!');
    
            // Redirect ke halaman show dengan ID yang baru saja disimpan
            return redirect()->route('dokumentasi.show',$dokumentasi->id_dokumentasi);

            // echo $dokumentasi->id_dokumentasi;
        } else {
            // Menampilkan alert gagal
            Alert::error('Gagal!', 'Gagal menyimpan file!');
    
            // Redirect kembali ke halaman form atau halaman lain yang sesuai
            return redirect()->route('dokumentasi.create');
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

    // Store images in the database using create method
    foreach ($images as $imageData) {
        Dokumentasi_foto::create($imageData);
    }
 // Set flash 
  return response()->json(['success' => true, 'message' => 'Images uploaded successfully.']);

    //  Session::flash('success', 'Images uploaded successfully.');
    // return response()->json(['success'=>$images]);
}
   




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $type_menu = 'dokumentasi';
        $dokumentasi = Dokumentasi::find($id);
        $images = Dokumentasi_foto::where('id_dokumentasi', $id)->get();

        return view('rw.data_dokumentasi.create_photo' ,compact('type_menu','dokumentasi','id','images'));
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
