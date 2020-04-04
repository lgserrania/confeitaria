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

  <!-- Favicons -->
  <link rel="shortcut icon" href="{{asset('site/assets/img/favicon.png')}}')}}">
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
        <div class="page-title bg-dark dark">
            <!-- BG Image -->
            <div class="bg-image bg-parallax"><img src="{{asset('site/assets/img/photos/bg-croissant.jpg')}}"> alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 push-lg-4">
                        <h1 class="mb-0">Checkout</h1>
                        <h4 class="text-muted mb-0">Confirme alguns dados e seu pedido já está feito!</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section -->
        <section class="section bg-light">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 push-xl-8 col-lg-5 push-lg-7">
                        <div class="shadow bg-white stick-to-content mb-4">
                            <div class="bg-dark dark p-4"><h5 class="mb-0">Seu carrinho</h5></div>
                            <table class="table-cart">
                                <thead colspan="2">
                                    <th>Produtos</th>
                                </thead>
                                @foreach(session()->get("carrinho")->produtos as $prod)
                                @php
                                    $produto = \App\Produto::find($prod->produto)   
                                @endphp
                                <tr>
                                    <td class="title">
                                        <span class="name">{{$produto->nome}}</span>
                                        <span class="caption text-muted">{{$produto->tamanhos->where("id",$prod->tamanho)->first()->nome}} - {{$produto->sabores->where("id",$prod->sabor)->first()->nome}}</span>
                                    </td>
                                    <td class="price">R${{number_format($prod->total,2,",",".")}}</td>
                                    <td class="actions">
                                        <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                                    </td>
                                </tr>
                                @endforeach                         
                            </table>
                            <table class="table-cart">
                                <thead colspan="2">
                                    <th>Bolos</th>
                                </thead>
                                @foreach(session()->get("carrinho")->bolos as $bolo)
                                    <tr>
                                        <td class="title">
                                            <span class="name">Bolo {{\App\Categoria::find($bolo->categoria)->nome}}</span>
                                            {{-- <span class="caption text-muted"></span> --}}
                                        </td>
                                        <td class="price">R${{number_format($bolo->total,2,",",".")}}</td>
                                        <td class="actions">
                                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="cart-summary">
                                <div class="row text-lg">
                                    <div class="col-7 text-right text-muted">Total:</div>
                                    <div class="col-5"><strong>R${{number_format(session()->get("carrinho")->total, 2, ",",".")}}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 pull-xl-4 col-lg-7 pull-lg-5">
                        <div class="bg-white p-4 p-md-5 mb-4">
                            <form>
                                <h4 class="border-bottom pb-4"><i class="ti ti-user mr-3 text-primary"></i>Informações básicas</h4>
                                <div class="row mb-5">
                                    <div class="form-group col-sm-6">
                                        <label>Nome:</label>
                                        <input type="text" name="nome" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Sobrenome:</label>
                                        <input type="text" name="sobrenome" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Nascimento:</label>
                                        <input type="date" name="nascimento" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>CPF:</label>
                                        <input type="text" name="cpf" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Seu endereço:</label>
                                        <input type="text" name="endereco" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Cidade:</label>
                                        <input type="text" name="cidade" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Telefone de contato:</label>
                                        <input type="text" name="telefone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>E-mail (Opcional):</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                </div>

                                <h4 class="border-bottom pb-4"><i class="ti ti-package mr-3 text-primary"></i>Delivery</h4>
                                <div class="row mb-5">
                                    <div class="form-group col-sm-6">
                                        <label>Delivery:</label>
                                        <div class="select-container">
                                            <select name="agendado" class="form-control">
                                                <option value="0">Hoje</option>
                                                <option value="1">Agendado</option>
                                            </select>
                                        </div>
                                    </div>                 
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-6" id="datepicker" style="display: none;">
                                        <div class="form-group">
                                            <label for="">Data de agendamento</label>
                                            <input type="datetime-local"
                                            class="form-control" name="dataAgendamento" id="" aria-describedby="helpId">
                                        </div>
                                    </div>               
                                </div>

                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <span id="frase-agendado"></span>    
                                    </div>               
                                </div>

                                {{-- <h4 class="border-bottom pb-4"><i class="ti ti-wallet mr-3 text-primary"></i>Pagamento</h4>
                                <div class="row text-lg">
                                    <div class="col-md-4 col-sm-6 form-group">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="payment_type" value="pagseguro" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Pagseguro</span>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 form-group">
                                        <label class="custom-control custom-radio">
                                            <input type="radio" name="payment_type" value="dinheiro" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Dinheiro</span>
                                        </label>
                                    </div>
                                </div> --}}
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg" id="botao-pedido"><span>Fazer pedido</span></button>
                                </div>
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

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

  </div>

  <!-- Modal / Product -->
  @include('site.modal_bolos')

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

    $("select[name='agendado").change(function(){
        if($("select[name='agendado").val() == "1"){
            show_datepicker();
        }else{
            hide_datepicker();
            $("#frase-agendado").html("");
        }
    });

    function show_datepicker(){
        $("#botao-pedido").attr("disabled","disabled");
        $("input[name='dataAgendamento']").val("");
        $("#datepicker").css('display','block');
    }

    function hide_datepicker(){
        $("#datepicker").css('display','none');
        $("#botao-pedido").attr("disabled",false);
    }

    $("input[name='dataAgendamento").focusout(function(){
        var datetime = $("input[name='dataAgendamento']").val();
        var hora = datetime.split("T")[1];
        var data = datetime.split("T")[0];
        if(!hora || !data){
            var html = "Por favor, informa a data e a hora corretamente !";
            $("#botao-pedido").attr("disabled","disabled");
        }else{
            data = data.split("-");
            var html = "Seu pedido será agendado para a data <b style='color:red'>" + data[2] + "/" + data[1] + "/" + data[0] + " - " + hora + "</b>.";
            $("#botao-pedido").attr("disabled",false);
        }
        $("#frase-agendado").html(html);
    });

    $("input[name='dataAgendamento").change(function(){
        var datetime = $("input[name='dataAgendamento']").val();
        var hora = datetime.split("T")[1];
        var data = datetime.split("T")[0];
        if(!hora || !data){
            var html = "Por favor, informa a data e a hora corretamente !";
            $("#botao-pedido").attr("disabled","disabled");
        }else{
            data = data.split("-");
            var html = "Seu pedido será agendado para a data <b style='color:red'>" + data[2] + "/" + data[1] + "/" + data[0] + " - " + hora + "</b>.";
            $("#botao-pedido").attr("disabled",false);
        }
        $("#frase-agendado").html(html);
    });

    $("#botao-pedido").click(function(){
        
    });

  </script>

</body>

</html>