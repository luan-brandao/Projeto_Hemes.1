<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function maps( ){
        // Verificar se o usuário está autenticado
        if (auth()->check()) {
            // Recuperar o nome do usuário autenticado
            $userName = auth()->user()->name;
        } else {
            $userName = null;
        }

        // Passar o nome do usuário para a view
        return view ('maps', compact('userName'));
    }
}
