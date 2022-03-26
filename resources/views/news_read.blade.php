@extends('layouts.app')
@section('content')
@foreach ($noticias as $noticia)
    @if($titulo == strtolower(\Str::slug($noticia->titulo)))
        <div class="d-flex justify-content-between">
            <div class="text-news col-lg">
                <div class="box">
                    <div class="box--title">
                        <div class="box--title--text"><?= $noticia['titulo']; ?></div>
                    </div>

                    <div class="information d-flex">
                        <div class="base category bgCategory yellow">{{ $noticia->categoria->nome }}</div>

                        <div class="base normal author">
                            <div class="image-author" style="background-image: url('https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=png&user=<?= $noticia->autor; ?>&direction=4&head_direction=3&size=s&headonly=1');"></div>
                            Escrita por <b><?= $noticia->autor; ?></b>
                        </div>

                        <div class="base normal date">Postada em <?= date('d', $noticia->data); ?> de <?= date('M', $noticia->data); ?> de <?= date('Y', $noticia->data); ?>, às <?= date('H:m', $noticia->data); ?></div>
                    </div>

                    <div class="text" style="padding: 0 23px;">
                        <?= $noticia['noticia']; ?>
                    </div>

                </div>

                <hr>

                <div class="box">
                    <div class="box--title">
                        <div class="box--title--text">Comentários</div>
                    </div>

                    <div class="comments list">
                        @foreach ($comentarios as $comentario)
                        <article class="comment">
                            <div class="base-avatar" style="background-color: #DBDFE3"></div>

                            <div class="infos col-lg">
                                <div class="base-title d-flex justify-content-between">
                                    <div class="base-title--author d-flex align-items-center">
                                        <div class="base-title--author--name">{{$comentario->autor}}</div>
                                        <div class="base-title--author--data">Comentou em {{ date('d', $comentario->data) }} de {{ date('M', $comentario->data) }} de {{ date('Y', $comentario->data) }}, às {{ date('h:i', $comentario->data) }}</div>
                                    </div>

                                    @if(session()->get('user'))
                                    <div class="buttons d-flex">
                                        @if(session()->get('user')[0]['nick'] == $comentario->autor)
                                        <div class="btn edit">Editar</div>
                                        @endif

                                        <div class="btn report">Reportar</div>
                                    </div>
                                    @endif
                                </div>

                                <div class="text">{{ \Str::limit($comentario->comentario, 270)}}</div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    @if(session()->get('user'))
                    <div class="comments">
                        <div class="events-comment"></div>
                        <article class="comment blue d-flex justify-content-between">
                            <div class="base-avatar" style="background-color: #DBDFE3"></div>

                            <div class="infos col-lg">
                                <div class="base-toComment">
                                    <form class="d-flex justify-content-between commentNews" methd="POST" autocomplete="off">
                                        <input type="text" class="text_comment" name="comment" placeholder="Comente..">

                                        <input type="submit" value="Comentar">
                                    </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @else
        NÓTICIA NÃO ENCONTRADA
    @endif
@endforeach
@endsection
