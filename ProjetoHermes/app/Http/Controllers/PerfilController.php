<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Mostra a view do perfil do usuário.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Verifica se o usuário está autenticado
        if (auth()->check()) {
            $userName = auth()->user()->name;

            return view('perfil', [
                'userName' => $userName
            ]);
        }

        // Caso o usuário não esteja autenticado, redireciona para login ou outra página
        return redirect()->route('login');
    }
}
