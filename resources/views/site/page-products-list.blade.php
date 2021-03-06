@php use Illuminate\Support\Str; @endphp

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Meta -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Title -->
  <title>Confeitaria Pedaço Mágico | Bolos personalizados e Confeitaria</title>

  <!-- OG METAs -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Confeitaria Pedaço Mágico">
  <meta property="og:url" content="https://www.pedacomagico.com.br">

  <meta property="og:title" content="Pedaço Mágico | Bolos personalizados e Confeitaria">
  <meta property="og:description" content="Mais de 16 anos confeitando sonhos...">
  <meta property="og:image" content="https://wwww.pedacomagico.com.br/site/assets/img/og-confeitaria.jpg">

  <meta name="keywords" content="Confeitaria, alfenas, sul de minas, festa, decoração, doces, aniversário, infantil, bolo, bolo de aniversário" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />


  <!-- Favicons -->
  <link rel="shortcut icon" href="{{asset('site/assets/img/favicon.png')}}">
  <link rel="apple-touch-icon" href="{{asset('site/assets/img/favicon_60x60.png')}}">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('site/assets/img/favicon_76x76.png')}}">
  <link rel="apple-touch-icon" sizes="120x120" href="{{asset('site/assets/img/favicon_120x120.png')}}">
  <link rel="apple-touch-icon" sizes="152x152" href="{{asset('site/assets/img/favicon_152x152.png')}}">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="{{asset('site/assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('site/assets/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('site/assets/plugins/animate.css/animate.min.css')}}">
  <link rel="stylesheet" href="{{asset('site/assets/plugins/animsition/dist/css/animsition.min.css')}}">

  <!-- CSS Icons -->
  <link rel="stylesheet" href="{{asset('site/assets/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('site/assets/plugins/font-awesome/css/font-awesome.min.css')}}">

  <!-- CSS Theme -->
  <link id="theme" rel="stylesheet" href="{{asset('site/assets/css/themes/theme-beige.min.css')}}">

</head>

<body>

  <!-- Body Wrapper -->
  <div id="body-wrapper" class="animsition">

    @include('site.structure_menu')

    <!-- Content -->
    <div id="content">

      <!-- Page Title -->
      <div class="page-title bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 push-lg-4">
              <h1 class="mb-0">Escolha o seu</h1>
              <h4 class="text-muted mb-0">Adicione os produtos no carrinho e seja feliz!!!</h4>
            </div>
          </div>
        </div>
      </div>

      <!-- Page Content -->
      <div class="page-content">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-md-3">
              <!-- Menu Navigation -->
              <nav id="menu-navigation" class="stick-to-content" data-local-scroll>
                <ul class="nav nav-menu bg-dark dark">
                  @foreach($produtos as $produto)
                    <li><a href="#{{Str::slug($produto->nome)}}">{{$produto->nome}}</a></li>
                  @endforeach
                </ul>
              </nav>
            </div>
            <div class="col-md-9">
              <!-- Menu Category / Bolo de Pote -->
              @foreach($produtos as $produto)
                <div id="{{Str::slug($produto->nome)}}" class="menu-category">
                  <div class="menu-category-title">
                    <div class="bg-image"><img src="{{asset($produto->imagens->first()->caminho)}}" alt=""></div>
                    <h2 class="title">{{$produto->nome}}</h2>
                  </div>
                  <div class="menu-category-content">
                    <!-- Menu Item -->
                    @foreach($produto->sabores as $sabor)
                      <div class="menu-item menu-list-item">
                        <div class="row align-items-center">
                          <div class="col-sm-6 mb-2 mb-sm-0">
                            <h6 class="mb-0">{{$sabor->nome}}</h6>

                            @if($produto->tamanhos) <span class="text-muted text-sm">Tamanhos: {{implode(', ', $produto->tamanhos->pluck("nome")->toArray())}}</span> @endif
                          </div>
                          <div class="col-sm-6 text-sm-right">
                            @php
                              $preco_tamanho = $produto->tamanhos->min("preco");
                              $preco_sabor = $sabor->preco;
                            @endphp
                            <span class="text-md mr-4"><span class="text-muted">a partir de</span> R${{number_format($preco_tamanho + $preco_sabor, "2", ".", ",")}}</span>
                            <button class="btn btn-outline-secondary btn-sm" data-target="#{{Str::slug($produto->nome) . Str::slug($sabor)}}Modal" data-toggle="modal"><span>Comprar</span></button>
                          </div>
                        </div>
                      </div>
                      @include('site.modal_produtos')    
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      @include('site.structure_footer')

    </div>
    <!-- Content / End -->

    <!-- Panel Cart -->
    @include('site.modal_panelcart')

    <!-- Panel Mobile -->
    @include('site.modal_panelmobile')

    @include('site.modal_bolos')  

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

  </div>

  <!-- JS Plugins -->
  <script src="{{asset('site/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/tether/dist/js/tether.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/slick-carousel/slick/slick.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/jquery.appear/jquery.appear.js')}}"></script>
  <script src="{{asset('site/assets/plugins/jquery.scrollto/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/jquery.localscroll/jquery.localScroll.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/twitter-fetcher/js/twitterFetcher_min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/skrollr/dist/skrollr.min.js')}}"></script>
  <script src="{{asset('site/assets/plugins/animsition/dist/js/animsition.min.js')}}"></script>

  <!-- JS Core -->
  <script src="{{asset('site/assets/js/core.js')}}"></script>

  <!-- JS Stylewsitcher -->
  <script src="{{asset('site/styleswitcher/styleswitcher.js')}}"></script>

  <script>

    $(document).ready(function(){
		var url = window.location.href;
		var id = url.split("#")[1];
		$('html, body').animate({
			scrollTop: $('#' + id + '').offset().top
		}, 'slow');
    });

    function adicionar(ppid, ssid){
		var ttid = $("input[name='tamanho" + ppid + "']:checked").val();
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.post( "/carrinho/adicionar/produto",{tid : ttid, sid : ssid, pid : ppid}, function(data) {
			location.reload(true);
		});
    }

  </script>

</body>

</html>