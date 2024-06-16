<?php

// app/Http/Controllers/RouteListController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use Illuminate\Support\Facades\Storage;

class RouteListController extends Controller
{
    /**
     * Exibe uma lista de todas as rotas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $routes = Route::all();

        return view('routes.list', compact('routes'));
    }

    /**
     * Remove a rota especificada do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('routes.index')->with('success', 'Rota excluída com sucesso!');
    }
}
