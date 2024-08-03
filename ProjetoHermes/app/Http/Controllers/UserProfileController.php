<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    /**
     * Mostra o formulário para edição do perfil.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $user = auth()->user();
        return view('perfil_edit', compact('user'));
    }

    /**
     * Processa a atualização do perfil do usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'driver_license' => 'nullable|string|max:255',
            'vehicle' => 'nullable|string|max:255',
        ]);

        // Atualiza os dados do usuário
        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->driver) {
            $user->driver_license = $request->driver_license;
            $user->vehicle = $request->vehicle;
        }

        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil atualizado com sucesso.');
    }
}
