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
  <body>

    <aside class="aside aside-fixed">
		<div class="aside-header">
			<a href="index.html" class="aside-logo">dash<span>forge</span></a>
			<a href="#" class="aside-menu-link">
			<i data-feather="menu"></i>
			<i data-feather="x"></i>
			</a>
		</div>
      <div class="aside-body">
			<div class="aside-loggedin">
			<div class="d-flex align-items-center justify-content-start">
				<a href="#" class="avatar"><img src="{{ asset('admin/img/img1.png') }}" class="rounded-circle" alt=""></a>
				<div class="aside-alert-link">
				<a href="#" class="new" data-toggle="tooltip" title="You have 2 unread messages"><i data-feather="message-square"></i></a>
				<a href="#" class="new" data-toggle="tooltip" title="You have 4 new notifications"><i data-feather="bell"></i></a>
				<a href="#" data-toggle="tooltip" title="Sign out"><i data-feather="log-out"></i></a>
				</div>
			</div>
			<div class="aside-loggedin-user">
				<a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2" data-toggle="collapse">
				<h6 class="tx-semibold mg-b-0">Katherine Pechon</h6>
				<i data-feather="chevron-down"></i>
				</a>
				<p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
			</div>
			<div class="collapse" id="loggedinMenu">
				<ul class="nav nav-aside mg-b-0">
				<li class="nav-item"><a href="#" class="nav-link"><i data-feather="edit"></i> <span>Edit Profile</span></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><i data-feather="user"></i> <span>View Profile</span></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><i data-feather="settings"></i> <span>Account Settings</span></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><i data-feather="help-circle"></i> <span>Help Center</span></a></li>
				<li class="nav-item"><a href="#" class="nav-link"><i data-feather="log-out"></i> <span>Sign Out</span></a></li>
				</ul>
			</div>
			</div><!-- aside-loggedin -->
			<ul class="nav nav-aside">
                <li class="nav-label">Painel</li>
                <li class="nav-item active"><a href="{{route('painel.pages')}}" class="nav-link"><i data-feather="shopping-bag"></i> <span>Page Manager</span></a></li>
			</ul>
		</div>
    </aside>

    <div class="content ht-100v pd-0">
        <div class="content-header">
            <div class="content-search">
                <i data-feather="search"></i>
                <input type="search" class="form-control" placeholder="Search...">
            </div>
            <nav class="nav">
                <a href="#" class="nav-link"><i data-feather="help-circle"></i></a>
                <a href="#" class="nav-link"><i data-feather="grid"></i></a>
                <a href="#" class="nav-link"><i data-feather="align-left"></i></a>
            </nav>
		</div><!-- content-header -->
		<div class="content-body">
			<div class="container pd-x-0">
				@yield("conteudo")
			</div>
		</div>
    </div>
    
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
