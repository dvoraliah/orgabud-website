<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // if(!$request['status'])
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'status' => 'integer'
        ]);

        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());

        $token = $user->createToken('myapptoken')->plainTextToken;

        if ($user->status_id == 3) {
            $user->assignRole('Admin');
        } else if ($user->status_id == 2) {
            $user->assignRole('Premium');
        } else {
            $user->assignRole('Regular');
        }
        
        return response([
            'message' => "Création de l'utilisateur réussie.",
            'donnees' => User::query()->orderBy('id', 'desc')->first(),
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //Verification du mail
        $user = User::where('email', $request['email'])->first();


        //Verification du password
        if(!$user || !Hash::check($request['password'], $user->password))
        {
            return response(
                [
                    'message' => 'Mot de passe ou email incorrects.'
                ],401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Deconnection réussie'
        ];
    }
    public function isRegister(Request $request){
        $request->validate([
            'email' => 'required'
        ]);
        $findUser = User::where('email', $request['email'])->first();
        if($findUser){
            $codeReset = random_int(1, 9). random_int(1, 9). random_int(1, 9). random_int(1, 9);
        }

        return response([
            'Resultat' => $findUser ? $codeReset : false,
        ]);
    }
}
