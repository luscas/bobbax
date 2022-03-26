@inject('menu', 'App\Http\Controllers\MenuController')

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Bobbax - Um novo jeito de viver</title>
    <link rel="stylesheet" href="/assets/fontweasome/css/all.css" />
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/assets/css/tipsy.css" />
	<link rel="stylesheet" href="/assets/css/style.css" />
</head>

<body>
	<div class="base-player">
		<div class="container d-flex justify-content-center align-items-center" style="height: 100%; background: none;">
			<div class="base-avatar avatar-player">
				<div class="avatar" style="background: url('https://www.habbo.com.br/habbo-imaging/avatarimage?user=Spolle&action=std&direction=2&head_direction=3&gesture=sml&size=l') -7px -41px;"></div>
			</div>

			<div class="button player">
				<i class="fas fa-pause action btn-player" rel="pause"></i>
			</div>

			<div class="info-status">
				<div class="info-status--program d-flex">
					<div class="info-status--program--name">Carregando...</div>
					<div class="live d-flex align-items-center">AO VIVO</div>
				</div>

				<div class="info-status--name">Carregando...</div>
			</div>

			<div class="listeners">
				<div class="number info-status--listeners">...</div>
				<div style="margin-top: -17px;">ouvintes</div>
			</div>

			<div class="choose-fs" style="left: 30px;">
				<div class="item active d-flex align-items-center justify-content-center">
					<div class="fa-site--icon" style="background: url('assets/imagens/selo.png'); background-repeat: no-repeat; background-position: center;"></div>
					<div class="fa-site--name">Escolha um fã site</div>
					<i class="fas fa-chevron-down fa-site--arrow"></i>
				</div>

				<div class="lists radio"></div>
			</div>
		</div>
	</div>

	<div class="header">
		<div class="logo"></div>
	</div>

	<div class="container" style="background-color: white; border-radius: 30px 30px 0 0; margin-top: -50px">
		<div class="content">
			<div class="menu">
				<ul class="list">
                    @foreach($menu->getMenu() as $menu_item)
                        <li class="item">
                            <div class="icon home"></div>
                            <a href="{{ $menu_item->link == null ? '#' : $menu_item->link }}" class="box--title">{{ $menu_item->nome }}</a>

                            @if(sizeof($menu_item->submenu) > 0)
                            <ul class="submenu">
                                @foreach($menu_item->submenu as $submenu)
                                <li class="submenu--item">
                                    <a href="{{ $submenu->link == null ? '#' : $submenu->link }}">{{ $submenu->nome }}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach
				</ul>

				<div class="base-login">
                    @if(!session()->get('user'))
                        <div class="login-btn" style="cursor: pointer">
                            <div class="ghost"></div>
                            Clube BX
                        </div>
                    @else
                        <div class="login-btn" style="cursor: pointer">
						    Olá, {{ session()->get('user')[0]['nick'] }}<br>
						    {{-- <a href="/auth/logout/">Sair</a> --}}
                        </div>
					@endif
				</div>
			</div>

			<div style="margin: 10px 0">
				@yield('content')
			</div>
		</div>

        @if(!session()->get('user'))
		<div class="box-show">
			<div class="container d-flex justify-content-center">
				<div class="close">X</div>
				<div class="box-show--container">
					<div class="container p-4">
						<div class="buttons">
							<button class="modal-section user login actived" rel="logar">Entrar</button>
							<button class="modal-section user register" rel="register">Cadastre-se</button>
						</div>

						<section class="login">
							<form method="POST" class="loginForm" autocomplete="off">
                                <div class="events-login"></div>

								<div class="box">
									<div class="box--title">
										<div class="box--title--text">Usuário</div>
									</div>

									<input type="text" name="nick" placeholder="Digite seu usuário">

									<div class="box--title">
										<div class="box--title--text">Senha</div>
									</div>

									<input type="password" name="senha" placeholder="Digite sua senha">

									<div class="options d-flex justify-content-between align-items-center">
										<button class="submit">Logar</button>

										<label>
											<input type="checkbox" name="remember_me">
											Manter conectado
										</label>

										<div class="forget-password">
											<a href="#" style="padding-left: 2px">Esqueci minha senha</a>
										</div>
									</div>
								</div>
							</form>
						</section>


						<section class="register">
							<form method="POST" class="registerForm" autocomplete="off">
								<div class="events-register"></div>
								<div class="box">
									<div class="box--title">
										<div class="box--title--text">Usuário</div>
									</div>

									<input type="text" name="nick" placeholder="Digite seu usuário" required>

									<div class="box--title">
										<div class="box--title--text">Senha</div>
									</div>

									<input type="password" name="senha" placeholder="Digite sua senha" required>

									<div class="box--title">
										<div class="box--title--text">Missão</div>
										<h3 style="font-size: 10px"> - Coloque na sua missão a frase abaixo</h3>
									</div>

									<input type="text" value="Bobbax2022" disabled>

									<div class="options d-flex justify-content-between align-items-center">
										<button class="submit">Cadastrar</button>
									</div>
								</div>
							</form>
						</section>
					</div>

					<div class="box-show--container--welcome d-flex justify-content-center align-items-center">
						<div class="image"></div>
					</div>
				</div>
			</div>
		</div>
        @endif

		<footer class="footer">
			<div class="copyrights">
				Site desenvolvido por <a href="#">Nadson Santiago (Nadson.Oculto)</a> e <a href="https://www.instagram.com/_rgrtorres/" target="_blank">Renan Torres (Spolle)</a>.
			</div>

			<div class="resume">
				<div class="credits">
					<div class="box--title">BobbaX</div>

					<div class="description">
						Copyright ©  Todos os direitos reservados. <b>BobbaX</b> 2019~<?php echo date('Y'); ?>.<br>
						Esta Fã Site não está afiliada com, patrocinada por, apoiada por, ou principalmente
						aprovada pela Sulake Oy ou suas empresas Afiliadas. Esta Fã Site pode utilizar as
						marcas registradas e outras propriedades intelectuais do Habbo, que estão
						permitidas sob a Política de Fã Sites Habbo.
					</div>
				</div>

				<a href="https://www.habbo.com.br/community/fansites" target="_blank">
					<div class="fs-habbo"></div>
				</a>
			</div>
		</footer>
	</div>

    <!-- JavaScript Bundle with Popper -->
	<script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/jquery-tipsy.js"></script>
	<script src="/assets/js/app.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $('*[title]').tipsy();

        var url = $(location).attr('href');
        var id_news = url.substring(url.indexOf('news/') + 5);
    </script>

    @if(session()->get('user'))
    <script>
        var user = '{{session()->get('user')[0]['nick']}}'
    </script>
    @endif
</body>
</html>
