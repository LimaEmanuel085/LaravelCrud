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

    //Delete user
    public function destroy(Request $request)
    {
        try {
            $id = $request->query('id');

            $user = UserModel::findOrFail($id);
            $user->delete();
            
            return response()->json(['message' => 'Usuário deletado com sucesso'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Falha ao deletar o usuário'], 500);
        }
    }

    public function update(Request $request)
    {
        
        try{

            $id = $request->query('id');
            $user = UserModel::find($id);

            if (!$user) {
                return response()->json(['error' => 'Usuário não encontrado'], 404);
            }

            $user->update($request->all());

            return response()->json(['message' => 'Usuário atualizado com sucesso'], 200);

        } catch (\Exception $e) {
            echo $e->getMessage();
            return response()->json(['error' => 'Falha ao atualizar o usuário'], 500);
        }
    }
}
