<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    //Create user
    public function store(Request $request)
    {
        try {

            $user = UserModel::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            
            return response()->json($user, 201);

        } catch (\Exception $e) {

            return response()->json(['error' => 'Falha ao criar o usuário'], 500);

        }
    }

    //Show users
    public function index()
    {
        try {

            $users = UserModel::all();
            return response()->json($users, 200);

        } catch (\Exception $e) {

            return response()->json(['error' => 'Falha ao listar os usuários'], 500);

        }
    }
}
