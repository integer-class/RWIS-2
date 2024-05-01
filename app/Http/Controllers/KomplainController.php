<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komplain;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        if ($request->has('search')) {
            $komplain = Komplain::with('penduduk')
                                ->whereHas('penduduk', function ($query) use ($request) {
                                    $query->where('nama', 'LIKE', '%' . $request->search . '%');
                                })
                                ->paginate(8);
        } else {
            $komplain = Komplain::with('user')->paginate(8);
        }

        
        $type_menu = 'komplain'; 
        return view('rw.data_komplain.index', compact('type_menu', 'komplain'));



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
