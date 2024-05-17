<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pengumuman
        $type_menu = 'pengumuman';
        return view('rw.data_pengumuman.index', compact('type_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $type_menu = 'pengumuman';

        //ambil data pengumuman
        $rt = \App\Models\Rt::all();




        return view('rw.data_pengumuman.create', compact('type_menu','rt'));
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
