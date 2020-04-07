<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Painel Confeitaria">
    <meta name="author" content="PluzUp">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/img/favicon.png')}}">

    <title>Painel Administrativo - Confeitaria Pedaço Mágico</title>

    <!-- vendor css -->
    <link href="{{asset('admin/lib/%40fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">

    <!-- DashForge CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/dashforge.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dashforge.auth.css')}}">
</head>

<body>

    <div class="content content-fixed content-auth">
        <div class="container">
            <div class="media align-items-stretch justify-content-center ht-100p pos-relative">
                <div class="media-body align-items-center d-none d-lg-flex">
                    <div class="mx-wd-600">
                        <img src="{{asset('admin/img/img15.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <!-- media-body -->
                <div class="sign-wrapper mg-lg-l-50 mg-xl-l-60">
                    <div class="wd-100p">
                        <h3 class="tx-color-01 mg-b-5">Bem vindo!</h3>
                        <p class="tx-color-03 tx-16 mg-b-40">Faça login para continuar</p>
                        <form action="{{route('painel.logar')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email de Acesso</label>
                                <input type="email" class="form-control" name="email" placeholder="seunome@seuemail.com.br">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="senha" placeholder="Entre com sua senha">
                            </div>
                            <button type="submit" class="btn btn-brand-02 btn-block">Entrar</button>
                        </form>
                    </div>
                </div>
                <!-- sign-wrapper -->
            </div>
            <!-- media -->
        </div>
        <!-- container -->
    </div>
    <!-- content -->

    <footer class="footer">
        <div>
            <span>&copy; 2020 PainelADM v1.0.0. </span>
            <span>Criado por <a href="http://pluzup.com.br">PluzUp</a></span>
        </div>
        <div>
            <nav class="nav">
                <a href="#" class="nav-link">Tenha ajuda</a>
            </nav>
        </div>
    </footer>

    <script src="{{asset('admin/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/lib/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('admin/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>

    <script src="{{asset('admin/js/dashforge.js')}}"></script>

    <!-- append theme customizer -->
    <script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('admin/js/dashforge.settings.js')}}"></script>

</body>

</html>
