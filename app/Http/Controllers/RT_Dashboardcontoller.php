<?php

namespace App\Http\Controllers;
use App\Models\penduduk;
use App\Models\User;
use Alert;






use Illuminate\Http\Request;

class RT_Dashboardcontoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $type_menu = 'dashboard';

       
        $penduduk = Penduduk::where('nik', auth()->user()->nik)->first();

        $password_default = auth()->user()->default_password;

        

        

        if (!$penduduk) {
            return redirect()->route('error.page')->with('error', 'Data penduduk tidak ditemukan.');
        }
        
        return view('rt.index', compact('type_menu', 'penduduk', 'password_default'));
        
        
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
    public function update(Request $request, string $nik)
    {

        $penduduk = Penduduk::where('nik', $nik)->first();


        if ($request->has('password')) {
            $user = User::where('nik', $penduduk->nik)->first();
            $user->update([
                'password' => bcrypt($request->password),
                'default_password' => 'no', 
            ]);
        }
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('penduduk'), $imageName);
            $penduduk->update(['foto' => $imageName]);
        }

        Alert::success('Berhasil!', 'Berhasil menambahkan data!');
        
        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
