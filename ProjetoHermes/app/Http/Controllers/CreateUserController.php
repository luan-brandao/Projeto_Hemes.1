<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CreateUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('CreateUsers');
    }

    public function register(Request $request)
    {
        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criar um novo usuário com os dados do formulário
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Redirecionar o usuário após o registro
        return redirect('/')->with('success', 'Usuário registrado com sucesso!');
    }
}
