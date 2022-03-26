@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="text-news col-lg">
            <div class="box">
                <div class="box--title">
                    <div class="box--title--text">{{ $pagina->titulo }}</div>
                </div>

                <div class="text" style="padding: 0 23px;">
                    {!! $pagina->conteudo !!}
                </div>

            </div>
        </div>
    </div>
@endsection
