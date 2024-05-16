<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use App\Models\Dokumentasi; 

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Session;




class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_menu = 'dokumentasi';

        return view('rw.data_dokumentasi.index' , compact('type_menu'));
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
    public function store(Request $request): JsonResponse
{
    try {
        $images = [];

        // Process each uploaded image
        foreach ($request->file('files') as $image) {
            // Generate a unique name for the image
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            // Move the image to the desired location
            $image->move(public_path('images'), $imageName);

            // Add image information to the array
            $images[] = [
                'name' => $imageName,
                'path' => asset('/images/' . $imageName),
                'filesize' => filesize(public_path('images/' . $imageName))
            ];
        }

        // Store images in the database using create method
        foreach ($images as $imageData) {
            Dokumentasi::create([
                'foto' => $imageData['name'] // Assuming 'foto' field in the database corresponds to image name
            ]);
        }

        // Set flash
        return response()->json(['success' => true, 'message' => 'Images uploaded successfully.']);
        
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('Error uploading images: ' . $e->getMessage());

        // Return a JSON response with an error message
        return response()->json(['success' => false, 'message' => 'An error occurred while uploading images.'], 500);
    }
    
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
