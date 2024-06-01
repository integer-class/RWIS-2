<?php
/* app\Http\Controllers\Api\AuthController.php */
namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
class AuthController extends Controller
{
    
   
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only("nik", "password"))) {
            return response()->json(
                [
                    "user" => Null,
                    "message" => "Invalid login details",
                    "stus" => "failed",
                ],
                200
            );
        }
        $user = User::where("nik", $request["nik"])->firstOrFail();
        $user_loggedin=[
            'id' => $user->id,
            'nik' => $user->nik,
            'status'=>'loggedin'
        ];
        return response()->json(
            $user_loggedin,
            200
        );
    }
}