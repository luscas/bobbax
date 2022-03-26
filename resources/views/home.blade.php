@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between">
        <div class="col-lg">
            <div class="container">
                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Notícias Recentes</div>
                    </div>

                    <div class="box--content">
                        <div class="news">
                            @foreach($noticias as $noticia)
                            <article class="base-news">
                                <div class="image" style="background-image: url('{{ $noticia->imagem }}');">
                                    <div class="new"></div>
                                </div>

                                <div class="info col-sm">
                                    <div class="info--title">
                                        <a href="<?= 'news/'.$noticia->id.'/'.\Str::slug($noticia->titulo); ?>">{{ \Str::limit($noticia->titulo, 40) }}</a>
                                    </div>

                                    <div class="infoGeral">
                                        <div class="infoGeral--category red">{{ $noticia->categoria->nome }}</div>
                                        <div class="infoGeral--author">{{ $noticia->autor }}</div>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>

                        <div class="controllers-news d-flex justify-content-between align-items-center">
                            <div class="base-icon little">
                                <i class="fas fa-angle-left"></i>
                            </div>

                            <div class="base-icon big">
                                <i class="fas fa-redo-alt"></i>
                            </div>

                            <div class="base-icon little">
                                <i class="fas fa-angle-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md">
            <div class="container">
                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Publicidade</div>
                    </div>

                    <div class="box--content">
                        <div class="adsense">
                            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                <!-- The slideshow/carousel -->
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        Slide 1
                                    </div>

                                    @foreach ($slides as $slide)
                                        <div class="carousel-item">
                                            <a href="{{$slide->link}}" target="_blank">
                                                <div style="height: 270px; width: 290px; background-image: url({{$slide->imagem}}); background-size: cover;border-radius: 10px;"></div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Coisas Grátis</div>

                        <button>Ver Mais</button>
                    </div>

                    <div class="box--content">
                        <div class="items-grid">
                            @foreach($itens_gratis as $item_gratis)
                            <div class="item" title="{{ $item_gratis->titulo }}">
                                <div class="badge" style="background: url('{{ $item_gratis->imagem }}'); background-repeat: no-repeat; background-position: center;"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Últimos Emblemas</div>

                        <button>Ver Mais</button>
                    </div>

                    <div class="box--content">
                        <div class="items-grid">
                            @foreach($emblemas as $emblema)
                            <div class="item" title="{{ $emblema->nome }} - {{ $emblema->descricao }}">
                                <div class="badge">
                                    <img src="{{ $emblema->imagem }}" alt="{{ $emblema->nome }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="container">
                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Usuário Destaque</div>
                    </div>

                    <div class="box--content">
                        <div class="featured-user">
                            <div class="side-avatar ml-3">
                                <div class="side-avatar-puppet" style="background-image: url('https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=png&user={{ $destaques->d1_nick }}&direction=2&head_direction=3&size=s&gesture=sml&action=std');"></div>

                                <div class="side-avatar--base"></div>
                            </div>

                            <div class="featured-user--reason col-sm">
                                <span>{{ $destaques->d1_nick }}</span><br>
                                {{ \Str::limit($destaques->d1_motivo, 85) }}
                            </div>
                        </div>

                        <div class="featured-user mt-2">
                            <div class="featured-user--reason col-sm">
                                <span>{{ $destaques->d2_nick }}</span><br>
                                {{ \Str::limit($destaques->d2_motivo, 85) }}
                            </div>
                            <div class="side-avatar mr-3">
                                <div class="side-avatar-puppet" style="background-image: url('https://www.habbo.com.br/habbo-imaging/avatarimage?img_format=png&user={{ $destaques->d2_nick }}&direction=4&head_direction=3&size=s&gesture=sml&action=std');"></div>

                                <div class="side-avatar--base"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row box">
                    <div class="box--title">
                        <div class="box--title--text">Parceiros</div>
                    </div>

                    <div class="box--content">
                        <div class="partners">
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                            <div class="item" style="background: url('assets/imagens/parceiro-kihabbo.png'); background-repeat: no-repeat; background-position: center;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
