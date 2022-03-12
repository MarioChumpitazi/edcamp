<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function login(){
        $data=[
            'email'=>request('email'),
            'password'=>request('password')
        ];
        if(Auth::attempt($data)){
            $user= Auth::user();
            $loginData['token']=$user->createToken('EDtoken')->accessToken;

            return response()->json([
                "message"=>"Bienvenido",
                "data"=>$loginData
            ],200);

        } else{
            return response()->json([
                "message"=>"Error en el login"
            ],401);
        }

    }

    public function register(Request $request){
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        $loginData['token']=$user->createToken('EDtoken')->accessToken;

        return response()->json([
            "message"=>"Bienvenido nuevo usuario",
            "data"=>$loginData
        ],200);
    }
}