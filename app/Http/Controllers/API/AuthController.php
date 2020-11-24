<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function registrar_usuario(Request $request)
    {
        $request ->validate([
            'email' => 'required|email',
            'name'=>'required',
            'password'=>'required'
        ]);

        $user = new User();
        $user->rol_id = $request->rol_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


        if($user->save())
        $token = $user->createToken($request->email,['*'])->plainTextToken;
        return response(['user'=> $user, 'access_token'=> $token]);
            
            return abort(400, "No Se Pudo Registrar");
    }
    public function index(Request $request)
    {
        if($request->rol_id == 1){
            return response()->json(["users" => User::all()],200);
        }
        else if($request->rol_id == 2){
            return response()->json(["perfil" => $request-> user()],200);

        }
    }
    public function LogOut(Request $request)
    {
        return response()->json(["Eliminados" => $request->user()->tokens()->delete()],200);
    }
    public function LogIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email|password' => ['Usuario o Contraseña Incorrectos Favor De Verificar Los Datos'],
            ]);
        }
        if($user->rol_id == 1){
            $token = $user->createToken($request->email,['Admin'])->plainTextToken;
        }
        else if($user->rol_id == 2){
            $token = $user->createToken($request->email,['Usuario'])->plainTextToken;

        }
        
        return response()->json(["token"=>$token],201);

    }

    
}
