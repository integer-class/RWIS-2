<?php
/* app\Http\Controllers\Api\AuthController.php */
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\Penduduk;
use App\Models\Komplain;
use App\Models\KartuKeluarga;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AkomplainController extends Controller
{


    public function riwayat(Request $request)
    {
        $user = $request->user();

        $komplain = Komplain::where('nik', $user->nik)
        ->join('kategori_komplain','komplain.id_kategori_komplain', '=','kategori_komplain.id_kategori_komplain' )
        ->get();


        return response()->json([
            "user" => $user,
            "komplain" => $komplain,
            
        ], 200);
    }
   
}