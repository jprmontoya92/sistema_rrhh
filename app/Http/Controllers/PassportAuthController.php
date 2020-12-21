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
                'last_name' => 'required',
                'second_surname' => 'required',
                'first_email' => 'required|email',
                'second_email' => 'required|email',
                'password' => 'required|min:4',
                'phone' => 'required|min:9'
            ]);
    
            //inserto registro en mi tabla de usuarios
        
            if(User::find($request->rut) === null){
                
                $user = new User([
                    'rut'          => $request->rut,
                    'dv'           => $request->dv,
                    'name'         => $request->name,
                    'last_name'     => $request->last_name,
                    'second_surname'=> $request->second_surname,
                    'first_email'  => $request->first_email,
                    'second_email' => $request->second_email,
                    'password'     => bcrypt($request->password),
                    'phone'        => $request->phone
                    ]);
                    
                    $user->save();
                    /*  $token = $usuario->createToken('AuthApp')->accessToken; */
    
                return response()->json(['error'=>false, 'message'=> 'Usuario registrado!'],200);
            }else{

                return response()->json(['error'=>true, 'message'=>'Usuario con rut '.$request->rut.' ya existe en nuestros registros']);
            }
            
           
                
            
    
           
    
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
                    'message' => 'Usuario o contraseña incorrectos. Intentar nuevamente.'
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
