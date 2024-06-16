<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route; // Importe o modelo Route
use Illuminate\Support\Facades\Storage;

class RouteController extends Controller
{
    /**
     * Exibe o formulário de criação de rota.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('routes.create');
    }

    /**
     * Armazena uma nova rota no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'coordinates_file' => 'required|file|mimes:json|max:2048', // Limitar a 2MB
        ]);

        // Salvar o arquivo JSON no sistema de arquivos
        $file = $request->file('coordinates_file');
        $path = $file->storeAs('json_files', $file->getClientOriginalName());

        // Ler e decodificar o arquivo JSON
        $jsonContents = Storage::get($path);
        $coordinates = json_decode($jsonContents, true);

        // Salvar a rota no banco de dados
        $route = new Route();
        $route->name = $request->name;
        $route->coordinates = $coordinates['coordinates']; // Salva as coordenadas como array PHP
        $route->save();

        // Redirecionar de volta ao formulário com mensagem de sucesso
        return redirect()->back()->with('success', 'Rota cadastrada com sucesso!');
    }
}
