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
    <meta property="og:image" content="https://wwww.pedacomagico.com.br/assets/img/og-confeitaria.jpg">

    <meta name="keywords" content="Confeitaria, alfenas, sul de minas, festa, decoração, doces, aniversário, infantil, bolo, bolo de aniversário" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('site/assets/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('site/assets/img/favicon_60x60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('site/assets/img/favicon_76x76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('site/assets/img/favicon_120x120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('site/assets/img/favicon_152x152.png')}}">

    <!-- CSS Plugins -->
    <link rel="stylesheet" href="{{asset('site/assets/plugins/bootstrap/dist/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/plugins/slick-carousel/slick/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/plugins/animate.css/animate.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/plugins/animsition/dist/css/animsition.min.css')}}" />

    <!-- CSS Icons -->
    <link rel="stylesheet" href="{{asset('site/assets/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('site/assets/plugins/font-awesome/css/font-awesome.min.css')}}" />

    <!-- CSS Theme -->
    <link id="theme" rel="stylesheet" href="{{asset('site/assets/css/themes/theme-beige.min.css')}}" />

</head>

<body>

    <!-- Body Wrapper -->
    <div id="body-wrapper" class="animsition">

        @include('site.structure_menu') 

        <!-- Content -->
        <div id="content">

            <!-- Section - Destaque -->
            @include('site.home_destaque')

            <!-- Section - Ofertas especiais -->
            @include('site.include_readycakes')

            <!-- Section - Passos -->
            @include('site.include_steps')
            
            <!-- Section - Produtos -->
            @include('site.include_products')           
            
            <!-- Section - Blog -->
            @include('site.include_blog')           
                                   
            <!-- Section - parallax promo -->
            @include('site.include_parallax')           
            
            <!-- Footer -->
            @include('site.structure_footer')           
            
            
        </div>
        <!-- Content / End -->
        
        <!-- Panel Cart -->
        @include('site.modal_panelcart')           
        
        <!-- Panel Mobile -->
        @include('site.modal_panelmobile')           
        
        <!-- Body Overlay -->
        <div id="body-overlay"></div>
        
    </div>
    
    <!-- Modal / Product -->
    @include('site.modal_bolos')           
    
    <!-- Video Modal / Demo -->
    @include('site.modal_video')           
    

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

</body>

</html>