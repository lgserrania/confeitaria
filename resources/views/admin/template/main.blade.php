<!DOCTYPE html>
<html lang="pt-br">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.png') }}">

    <title>Confeitaria - Painel Administrativo</title>

    <!-- vendor css -->
    <link href="{{ asset('admin/lib/%40fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/dashforge.css') }}">
	<link rel="stylesheet" href="{{ asset('admin/css/dashforge.dashboard.css') }}">
	
    @yield('styles')
  </head>
  <body @yield('body-tag')>

    <aside class="aside aside-fixed">
		<div class="aside-header">
		  	<a href="{{route('painel.index')}}" class="aside-logo">Painel<span>ADM</span></a>
			<a href="#" class="aside-menu-link">
				<i data-feather="menu"></i>
				<i data-feather="x"></i>
			</a>
		</div>
		<div class="aside-body">
		  	<div class="aside-loggedin">
				<div class="d-flex align-items-center justify-content-start">
					<div class="aside-alert-link">
						<a href="{{route('painel.logout')}}" data-toggle="tooltip" title="Sair"><i data-feather="log-out"></i></a>
					</div>
				</div>
				<div class="aside-loggedin-user">
					<a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
						<h6 class="tx-semibold mg-b-0">Confeitaria Pedaço Mágico</h6>
					</a>
					<p class="tx-color-03 tx-12 mg-b-0">Administrador</p>
				</div>
		  	</div><!-- aside-loggedin -->
			<ul class="nav nav-aside">
		
				{{-- <li class="nav-label">Análise de Dados</li>
				<li class="nav-item active"><a href="{{route('painel.index')}}" class="nav-link"><i data-feather="globe"></i> <span>Tráfego do Site</span></a></li>
				<li class="nav-item"><a href="{{route('painel.vendas.dados')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dados de Vendas</span></a></li> --}}
		
				<li class="nav-label mg-t-25">Produtos</li>
				<li class="nav-item"><a href="{{route('painel.pedidos.controle')}}" class="nav-link"><i data-feather="check-square"></i> <span>Controle de Pedidos</span></a></li>
				<li class="nav-item"><a href="{{route('painel.produtos.bolos')}}" class="nav-link"><i data-feather="box"></i> <span>Bolos</span></a></li>
				<li class="nav-item"><a href="{{route('painel.produtos.variados')}}" class="nav-link"><i data-feather="grid"></i> <span>Variados</span></a></li>
		
				<li class="nav-label mg-t-25">Aplicativos</li>
				<li class="nav-item"><a href="{{route('painel.pedidos.calendario')}}" class="nav-link"><i data-feather="calendar"></i> <span>Calendário Pedidos</span></a></li>
				<li class="nav-item"><a href="{{route('painel.utilitarios.calculadora')}}" class="nav-link"><i data-feather="sliders"></i> <span>Calculadora de Custos</span></a></li>
				<li class="nav-item"><a href="{{route('painel.clientes.contatos')}}" class="nav-link"><i data-feather="users"></i> <span>Contatos clientes</span></a></li>
				<li class="nav-item"><a href="{{route('painel.utilitarios.mensagens')}}" class="nav-link"><i data-feather="mail"></i> <span>Mensagens</span></a></li>
				<!-- <li class="nav-item"><a href="app-chat.php" class="nav-link"><i data-feather="message-square"></i> <span>Chat</span></a></li> -->
		
				<li class="nav-label mg-t-25">Conteúdo site</li>
				<li class="nav-item"><a href="{{route('painel.page.manager')}}" class="nav-link"><i data-feather="file-text"></i> <span>Páginas</span></a></li>
				<li class="nav-item"><a href="{{route('painel.page.manager.destaques')}}" class="nav-link"><i data-feather="image"></i> <span>Destaques</span></a></li>
				{{-- <li class="nav-item"><a href="page-manager-blog.php" class="nav-link"><i data-feather="align-center"></i> <span>Blog</span></a></li>
				<li class="nav-item"><a href="page-manager-banners.php" class="nav-link"><i data-feather="tag"></i> <span>Banners</span></a></li> --}}
		
			</ul>
		</div>
	</aside>
	  
	<div class="content ht-100v pd-0">
		<div class="content-header">

		</div><!-- content-header -->
		<div class="content-body pd-0">
			@yield("conteudo")
		</div>
    </div>
    @yield("extras")
    <script src="{{ asset('admin/lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/lib/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery.flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('admin/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/dashforge.js') }}"></script>
    <script src="{{ asset('admin/js/dashforge.aside.js') }}"></script>
	@yield("scripts")
  </body>
</html>
