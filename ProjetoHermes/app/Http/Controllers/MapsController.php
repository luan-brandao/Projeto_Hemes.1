<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use App\Models\User;

class MapsController extends Controller
{
    /**
     * Retorna a view 'maps' com os dados necessários para exibir o mapa.
     *
     * @return \Illuminate\View\View
     */
    public function maps()
    {
        // Verificar se o usuário está autenticado
        $userName = auth()->check() ? auth()->user()->name : null;

        // Recuperar todas as rotas do banco de dados
        $routes = Route::all();

        // Recuperar dados dos motoristas para adicionar marcadores no mapa
        $motoristas = User::where('driver', true)->get(); // Utiliza o campo 'driver'

        // Passar o nome do usuário, as rotas e os motoristas para a view
        return view('maps', compact('userName', 'routes', 'motoristas'));
    }
}
