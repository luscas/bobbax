<?php

namespace App\Http\Controllers;

use App\Models\Pagina;

class PaginaController extends Controller
{
    public function index($id) {
        $pagina = Pagina::find($id);

        return view('pagina')->with([
            'pagina' => $pagina
        ]);
    }
}
