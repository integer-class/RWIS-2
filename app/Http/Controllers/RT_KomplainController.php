<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;


class RT_KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
{
    $id_rt = auth()->user()->id_rt; 

    if ($request->has('search')) {
        $komplain = Komplain::with('penduduk')
                            ->whereHas('penduduk', function ($query) use ($id_rt, $request) {
                                $query->where('id_rt', $id_rt)
                                      ->where(function ($query) use ($request) {
                                          $query->where('nama', 'LIKE', '%' . $request->search . '%')
                                                ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
                                      });
                            })
                            ->paginate(8);
    } else {
        $komplain = Komplain::with('penduduk')
                            ->whereHas('penduduk', function ($query) use ($id_rt) {
                                $query->where('id_rt', $id_rt);
                            })
                            ->paginate(8);
    }

    $jumlah_komplain = Komplain::whereHas('penduduk', function ($query) use ($id_rt) {
                                $query->where('id_rt', $id_rt);
                            })->count();
    $jumlah_komplain_diterima = Komplain::whereHas('penduduk', function ($query) use ($id_rt) {
                                        $query->where('id_rt', $id_rt);
                                    })->where('status_komplain', 'Diterima')->count();
    $jumlah_komplain_diproses = Komplain::whereHas('penduduk', function ($query) use ($id_rt) {
                                        $query->where('id_rt', $id_rt);
                                    })->where('status_komplain', 'Diproses')->count();
    $jumlah_komplain_selesai = Komplain::whereHas('penduduk', function ($query) use ($id_rt) {
                                        $query->where('id_rt', $id_rt);
                                    })->where('status_komplain', 'Selesai')->count();

    $type_menu = 'komplain';
    return view('rw.data_komplain.index', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));
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
     * Show the form for editi
     * ng the specified resource.
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
