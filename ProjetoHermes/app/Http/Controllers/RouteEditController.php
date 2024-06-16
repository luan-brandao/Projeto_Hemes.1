<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route; // Importe o modelo Route
use Illuminate\Support\Facades\Storage;

class RouteEditController extends Controller
{
    /**
     * Lista todas as rotas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $routes = Route::all();
        return view('routes.edit_index', compact('routes'));
    }

    /**
     * Exibe o formulário de edição de uma rota.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $route = Route::findOrFail($id);
        return view('routes.edit', compact('route'));
    }

    /**
     * Atualiza uma rota no banco de dados.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'coordinates_file' => 'required|file|mimes:json|max:2048', // Limitar a 2MB
        ]);

        // Salvar o arquivo JSON no sistema de arquivos
        $file = $request->file('coordinates_file');
        $path = $file->storeAs('json_files', $file->getClientOriginalName());

        // Ler e decodificar o arquivo JSON
        $jsonContents = Storage::get($path);
        $coordinates = json_decode($jsonContents, true);

        // Atualizar a rota no banco de dados
        $route = Route::findOrFail($id);
        $route->coordinates = $coordinates['coordinates']; // Salva as coordenadas como array PHP
        $route->save();

        // Redirecionar de volta ao formulário com mensagem de sucesso
        return redirect()->route('routes.edit_index')->with('success', 'Rota atualizada com sucesso!');
    }
}
