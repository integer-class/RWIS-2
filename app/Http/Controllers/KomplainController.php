<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;
use Alert;



class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        if ($request->has('search')) {
            $komplain = Komplain::with('penduduk')
                                ->where(function ($query) use ($request) {
                                    $query->whereHas('penduduk', function ($query) use ($request) {
                                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                                        })
                                        ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
                                })
                                ->paginate(8);
            $jumlah_komplain = Komplain::count();
           
            $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
            $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
            $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();
        } else {

            $komplain = Komplain::with('user')->paginate(8);

            //hitung jumlah komplain
            $jumlah_komplain = Komplain::count();
           
            $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
            $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
            $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

        }

        
        $type_menu = 'komplain'; 
        return view('rw.data_komplain.index', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));

    }
    //diterima
    public function diterima(Request $request)
        {
            if ($request->has('search')) {
                $komplain = Komplain::with('penduduk')
                                    ->where(function ($query) use ($request) {
                                        $query->whereHas('penduduk', function ($query) use ($request) {
                                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                                        })
                                        ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
                                    })
                                    ->where('status_komplain', 'status_komplain') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            } else {
                $komplain = Komplain::with('penduduk')
                                    ->where('status_komplain', 'Diterima') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            $type_menu = 'komplain'; 
            return view('rw.data_komplain.diterima', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));
        }
    }


    public function diproses(Request $request)
        {
            if ($request->has('search')) {
                $komplain = Komplain::with('penduduk')
                                    ->where(function ($query) use ($request) {
                                        $query->whereHas('penduduk', function ($query) use ($request) {
                                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                                        })
                                        ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
                                    })
                                    ->where('status_komplain', 'status_komplain') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            } else {
                $komplain = Komplain::with('penduduk')
                                    ->where('status_komplain', 'Diproses') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            $type_menu = 'komplain'; 
            return view('rw.data_komplain.diproses', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));
        }
    }

    public function selesai(Request $request)
        {
            if ($request->has('search')) {
                $komplain = Komplain::with('penduduk')
                                    ->where(function ($query) use ($request) {
                                        $query->whereHas('penduduk', function ($query) use ($request) {
                                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                                        })
                                        ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
                                    })
                                    ->where('status_komplain', 'status_komplain') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            } else {
                $komplain = Komplain::with('penduduk')
                                    ->where('status_komplain', 'Selesai') 
                                    ->paginate(8);
            $jumlah_komplain = Komplain::count();

                                    $jumlah_komplain_diterima = Komplain::where('status_komplain', 'Diterima')->count();
                                    $jumlah_komplain_diproses = Komplain::where('status_komplain', 'Diproses')->count();
                                    $jumlah_komplain_selesai = Komplain::where('status_komplain', 'Selesai')->count();

            $type_menu = 'komplain'; 
            return view('rw.data_komplain.selesai', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rw.data_komplain.index');
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
    public function show(string $id_komplain)
    {
        $komplain = Komplain::with(['user', 'penduduk', 'kategori_komplain'])->find($id_komplain);
        $type_menu = 'komplain';
        return view('rw.data_komplain.detail_komplain', compact('type_menu', 'komplain'));
    }


    //ubah status
    public function ubahstatus(Request $request,$id_komplain)
    {
        $komplain = Komplain::find($id_komplain);
    
        // tangkap dari form
        $status_komplain = request('status_komplain');


        //save ke database
        $komplain->status_komplain = $status_komplain;
        $komplain->save();
    
        Alert::success('Hore!', 'Status Komplain Berhasil Diubah');
    
        // // Redirect atau kembali ke halaman yang sesuai
        return redirect()->back();


    
    }
    // {
    //     // $komplain = Komplain::find($request->id_komplain);
    //     // $komplain->status_komplain = $request->status_komplain;
    //     // $komplain->save();

    //     // return redirect()->route('komplain.index');

    //     $id_komplain = $request->id_komplain;
    //     $status_komplain = $request->status_komplain;

    //     echo $id_komplain;
    //     echo $status_komplain;
    // }

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
