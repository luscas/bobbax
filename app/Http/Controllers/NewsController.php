<?php

namespace App\Http\Controllers;

use App\Models\ComentarioNoticia;
use Illuminate\Http\Request;
use App\Models\Noticia;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request) {

        $id = $request->id;
        $titulo = $request->titulo;

        $comentarios = ComentarioNoticia::where(['id_noticia' => $id])->get();
        $noticias = Noticia::where(['id' => $id])->get();

        return view('news_read', [
            'titulo' => $titulo,
            'noticias' => $noticias,
            'comentarios' => $comentarios
        ]);
    }

    public function create(Request $request) {
        $carbon = new Carbon();
        $comment = $request->comment;
        $id_news = substr($request->id_news, 0, strripos($request->id_news, '/'));

        ComentarioNoticia::insert(['comentario' => $comment, 'id_noticia' => $id_news, 'data' => time(), 'autor' => session()->get('user')[0]['nick']]);

        return response()->json([
            'success' => true,
            'message' => 'Inserido com sucesso'
        ]);
    }
}
