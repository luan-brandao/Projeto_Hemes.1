<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsDriverController extends Controller
{
    /**
     * Show the maps driver view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        // Não há necessidade de buscar motoristas, apenas retornar a view
        return view('mapsDriver'); // Certifique-se de que a view está localizada em resources/views/mapsDriver.blade.php
    }
}
