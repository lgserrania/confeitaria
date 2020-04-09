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

            <!-- Section -->
            <section class="section section-lg bg-dark">

                <!-- Video BG -->
                <!-- <div class="bg-video" data-property="{videoURL:'https://youtu.be/t4gN-iqeY0E', showControls: false, containment:'self',startAt:1,stopAt:39,mute:true,autoPlay:true,loop:true,opacity:0.8,quality:'hd1080'}"></div> -->
                <div class="bg-image zooming"><img src="{{asset('site/assets/img/photos/bg-restaurant.jpg')}}" alt=""></div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 push-lg-3">
                            <!-- Book a Table -->
                            <div class="utility-box">
                                <div class="utility-box-title bg-dark dark">
                                    <div class="bg-image"><img src="{{asset('site/assets/img/photos/modal-review.jpg')}}" alt=""></div>
                                    <div>
                                        <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                                        <h4 class="mb-0">Fale conosco</h4><br>
                                        <!-- <p class="lead text-muted mb-0">contato@pedacomagico.com.br ou (35) 98888-8888 </p> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h6 class="mb-1 text-muted">Contato:</h6>
                                            {{$contato->telefone}}
                                        </div>
                                        <div class="col-sm-6">
                                            <h6 class="mb-1 text-muted">E-mail:</h6>
                                            <a href="#">{{$contato->email}}</a>
                                        </div>
                                    </div>
                                </div>

                                <form action="#" id="booking-form" data-validate>
                                    <div class="utility-box-content">
                                        <div class="form-group">
                                            <label>Seu nome:</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail:</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Telefone:</label>
                                            <input type="text" name="phone" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Sua mensagem:</label>
                                            <textarea cols="30" rows="6" class="form-control" placeholder="Como podemos te ajudar?s"></textarea>
                                        </div>
                                    </div>
                                    <button class="utility-box-btn btn btn-secondary btn-block btn-lg btn-submit" type="submit">
                                        <span class="description">Enviar mensagem!</span>
                                        <span class="success">
                                            <svg x="0px" y="0px" viewBox="0 0 32 32">
                                                <path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11" /></svg>
                                        </span>
                                        <span class="error">Tente novamente...</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

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

    <!-- Modal / Product -->
    

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