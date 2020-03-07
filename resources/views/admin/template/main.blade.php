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
					<a href="#" class="avatar"><img src="{{asset('admin/img/img1.png')}}" class="rounded-circle" alt=""></a>
					<div class="aside-alert-link">
						<a href="app-mensagens.php" class="new" data-toggle="tooltip" title="Você tem 2 novas mensagens"><i data-feather="message-square"></i></a>
						<a href="prod-pedidos.php" class="new" data-toggle="tooltip" title="Você tem 4 novos pedidos"><i data-feather="bell"></i></a>
						<a href="#" data-toggle="tooltip" title="Sair"><i data-feather="log-out"></i></a>
					</div>
				</div>
				<div class="aside-loggedin-user">
				<a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
					<h6 class="tx-semibold mg-b-0">Confeitaria Pedaço Mágico</h6>
					<i data-feather="chevron-down"></i>
				</a>
				<p class="tx-color-03 tx-12 mg-b-0">Administrador</p>
				</div>
				<div class="collapse" id="loggedinMenu">
				<ul class="nav nav-aside mg-b-0">
					<li class="nav-item"><a href="#" class="nav-link"><i data-feather="edit"></i> <span>Editar Perfil</span></a></li>
					<li class="nav-item"><a href="#" class="nav-link"><i data-feather="user"></i> <span>Administrar contas</span></a></li>
					<li class="nav-item"><a href="#" class="nav-link"><i data-feather="settings"></i> <span>Configurações</span></a></li>
					<li class="nav-item"><a href="#" class="nav-link"><i data-feather="help-circle"></i> <span>Central de ajuda</span></a></li>
					<li class="nav-item"><a href="#" class="nav-link"><i data-feather="log-out"></i> <span>Sair</span></a></li>
				</ul>
				</div>
		  	</div><!-- aside-loggedin -->
			<ul class="nav nav-aside">
		
				<li class="nav-label">Análise de Dados</li>
				<li class="nav-item active"><a href="{{route('painel.index')}}" class="nav-link"><i data-feather="globe"></i> <span>Tráfego do Site</span></a></li>
				<li class="nav-item"><a href="{{route('painel.vendas.dados')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Dados de Vendas</span></a></li>
		
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
				<li class="nav-item"><a href="page-manager.php" class="nav-link"><i data-feather="file-text"></i> <span>Páginas</span></a></li>
				<li class="nav-item"><a href="page-manager-destaques.php" class="nav-link"><i data-feather="image"></i> <span>Destaques</span></a></li>
				<li class="nav-item"><a href="page-manager-blog.php" class="nav-link"><i data-feather="align-center"></i> <span>Blog</span></a></li>
				<li class="nav-item"><a href="page-manager-banners.php" class="nav-link"><i data-feather="tag"></i> <span>Banners</span></a></li>
		
			</ul>
		</div>
	</aside>
	  
	<div class="content ht-100v pd-0">
		<div class="content-header">
			<div class="content-search">
				<i data-feather="search"></i>
				<input type="search" class="form-control" placeholder="Pesquisar...">
			</div>
			<nav class="nav">
				<a href="#" class="nav-link" data-toggle="tooltip" title="Alguma dúvida?"><i data-feather="help-circle"></i></a>
				<!-- <a href="#" class="nav-link"><i data-feather="grid"></i></a>
				<a href="#" class="nav-link"><i data-feather="align-left"></i></a> -->
			</nav>
		</div><!-- content-header -->
		<div class="content-body">
			<div class="container pd-x-0">
				@yield("conteudo")
			</div>
		</div>
    </div>
	@yield("extras")
	<script src="{{asset('admin/quill/quill.min.js')}}"></script>
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
