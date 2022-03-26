<?php

namespace App\Http\Controllers;

use App\Models\Destaque;
use App\Models\Emblema;
use App\Models\ItensGratis;
use App\Models\Noticia;
use App\Models\Slide;
use App\Models\Menu;

class HomeController extends Controller
{
    public function index() {
        $noticias = Noticia::where(['status' => 'ativo'])->orderBy('id', 'DESC')->limit(5)->get();
        $itens_gratis = ItensGratis::where(['status' => 'ativo'])->orderBy('id', 'DESC')->limit(4)->get();
        $emblemas = Emblema::where(['status' => 'ativo'])->orderBy('id', 'DESC')->limit(4)->get();
        $destaques = Destaque::orderBy('id', 'DESC')->get()->first();
        $slides = Slide::where(['status' => 'ativo'])->orderBy('id', 'DESC')->get();

        $total = [
            'slides' => $slides->count(),
            'noticias' => $noticias->count(),
            'items_gratis' => $itens_gratis->count(),
            'emblemas' => $emblemas->count()
        ];

        return view('home', [
            'noticias' => $noticias,
            'itens_gratis' => $itens_gratis,
            'emblemas' => $emblemas,
            'destaques' => $destaques,
            'slides' => $slides,
            'total' => $total
        ]);
    }
}
