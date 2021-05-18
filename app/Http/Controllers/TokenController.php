<?php
namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Lumen\Routing\Controller;

class TokenController extends Controller
{
   
    public function gerarToken(Request $request) 
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();
        if(is_null($usuario) || Hash::check($request->password,$usuario->password)) {
            return response()->json(["message"=>"usuario invalido"],401);
        }

        $token = JWT::encode(['email'=> $request->email],env('JWT_KEY'));

        return [
            "access_token" => $token
        ];
    }
}
