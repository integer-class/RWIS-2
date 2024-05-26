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
     
         // Default query
         $query = Komplain::with('penduduk')
                          ->whereHas('penduduk', function ($query) use ($id_rt) {
                              $query->where('id_rt', $id_rt);
                          });
     
         // Add search filter if exists
         if ($request->has('search')) {
             $query->whereHas('penduduk', function ($query) use ($request) {
                 $query->where('nama', 'LIKE', '%' . $request->search . '%')
                       ->orWhere('judul_komplain', 'LIKE', '%' . $request->search . '%');
             });
         }
     
         // Add status filter if exists
         if ($request->has('status_komplain')) {
             $query->where('status_komplain', $request->status_komplain);
         }
     
         // Pagination
         $komplain = $query->paginate(8);
     
      
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
         return view('rt.rt_data_komplain.index', compact('type_menu', 'komplain', 'jumlah_komplain', 'jumlah_komplain_diterima', 'jumlah_komplain_diproses', 'jumlah_komplain_selesai'));
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
