<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index () {
        $cargos = Cargo::where(['status' => 'ativo', 'oculto' => 'n'])->orderBy('cat', 'ASC')->get();

        return view('team', [
            'cargos' => $cargos
        ]);
    }
}
