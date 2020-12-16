<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{

    public function signup(Request $request){
        // valido los datos que vienen por post
            $this->validate($request,[
                'rut' =>'required|min:8',
                'dv'  => 'required|min:1',
                'name' =>'required',
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);
    
            //inserto registro en mi tabla de usuarios
    
            $user = new User([
                'rut' => $request->rut,
                'dv' => $request->dv,
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
    
            $user->save();
    
           /*  $token = $usuario->createToken('AuthApp')->accessToken; */
    
            return response()->json(['Message'=> 'Usuario registrado!'],200);
    
        }
    
        public function login(Request $request){
    

            $request->validate([
                'rut' =>'required|min:8',
                'password' => 'required|min:4',
            ]);
    
            $credentials = request(['rut','password']);
    
            if(!Auth::attempt($credentials)){
                return response()->json([
                    'error' => true,
                    'message' => 'Unauthorized'
                ],401);
            }
    
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

    
            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
    
            $token->save();
    
            return response()->json([
                'error' => false,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at)->toDateTimeString(),
                'rut' => $request->rut
            ]);
    
        }
    
        public function logout(Request $request){
    
            $request->user()->token()->revoke();
    
            return response()->json(['message'=>'Successfully logged out']);
        }
    
}
