<!-- Header -->
<header id="header" class="light">

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Logo -->
                <div class="module module-logo dark">
                    <a href="index.html">
                        <img src="{{asset('site/assets/img/logo-light.svg')}}" alt="" style="width:200px">
                    </a>
                </div>
            </div>
            <div class="col-md-7">
                <!-- Navigation -->
                <nav class="module module-navigation left mr-4">
                    <ul id="nav-main" class="nav nav-main">
                        <li><a href="{{route('inicio')}}">Home</a></li>

                        <li class="has-dropdown">
                            <a href="#">A Confeitaria</a>
                            <div class="dropdown-container">
                                <ul class="dropdown-mega">
                                    <li><a href="{{route('sobre')}}">Sobre nós</a></li>
                                    <li><a href="{{route('galeria')}}">Galeria</a></li>
                                    {{-- <li><a href="page-reviews.php">Reviews</a></li> --}}
                                </ul>
                                <div class="dropdown-image">
                                    <img src="{{asset('site/assets/img/photos/dropdown-about.jpg')}}" alt="">
                                </div>
                            </div>
                        </li>

                        <li><a href="{{route('produtos')}}">Produtos</a></li>
                        {{-- <li><a href="page-blog.php">Blog</a></li> --}}
                        <li><a href="{{route('contato')}}">Contato</a></li>

                    </ul>
                </nav>
                <div class="module left">
                    <a href="#bolosModal" data-toggle="modal" class="btn btn-outline-secondary"><span>Monte seu bolo</span></a>
                </div>
            </div>
            <div class="col-md-2">
                <a href="#" class="module module-cart right" data-toggle="panel-cart">
                    <span class="cart-icon">
                        <i class="ti ti-shopping-cart"></i>
                        <span class="notification">{{count(session()->get("carrinho")->produtos) + count(session()->get("carrinho")->bolos)}}</span>
                    </span>
                    <span class="cart-value">R${{number_format(session()->get("carrinho")->total, 2, ",", ".")}}</span>
                </a>
            </div>
        </div>
    </div>

</header>
<!-- Header / End -->

<!-- Header -->
<header id="header-mobile" class="light">

    <div class="module module-nav-toggle">
        <a href="#" id="nav-toggle" data-toggle="panel-mobile"><span></span><span></span><span></span><span></span></a>
    </div>

    <div class="module module-logo">
        <a href="{{route('inicio')}}">
            <img src="{{asset('site/assets/img/logo-horizontal-dark.svg')}}" alt="">
        </a>
    </div>

    <a href="#" class="module module-cart" data-toggle="panel-cart">
        <i class="ti ti-shopping-cart"></i>
        <span class="notification">2</span>
    </a>

</header>
<!-- Header / End -->