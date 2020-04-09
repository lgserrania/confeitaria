<section class="section section-main section-main-2 bg-dark dark">

    <div id="section-main-2-slider" class="section-slider inner-controls">
        <!-- Slide -->
        @foreach(\App\Destaque::all() as $destaque)
            <div class="slide">
                <div class="bg-image zooming"><img src="{{asset($destaque->imagem)}}" alt=""></div>
                <div class="container v-center">
                    <h1 class="display-2 mb-2">{{$destaque->titulo}}</h1>
                    <h4 class="text-muted mb-5">{{$destaque->subtitulo}}</h4>
                    <div class="btn-group">
                        @if($destaque->opcao == "produto")
                            <a href="{{$destaque->link}}" class="btn btn-outline-primary btn-lg"><span>{{$destaque->texto_link}}</span></a>
                        @elseif($destaque->opcao == "bolo")
                            <a href="#bolosModal" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Montar meu bolo!</span></a>
                        @else
                            @if($destaque->link)
                                <a href="{{$destaque->link}}" class="btn btn-outline-primary btn-lg"><span>{{$destaque->texto_link}}</span></a>
                            @endif
                        @endif
                        {{-- <span class="price price-lg">por R${{$home->produto_pronta_entrega_preco}}</span> --}}
                    </div>
                </div>
            </div>
        @endforeach
        {{-- <!-- Slide -->
        <div class="slide">
            <div class="bg-image zooming"><img src="{{asset('site/assets/img/photos/slider-dessert_dark.jpg')}}" alt=""></div>
            <div class="container v-center">
                <h1 class="display-2 mb-2">Monte seu bolo agora</h1>
                <h4 class="text-muted mb-5">Escolha a cobertura, recheio, massa.. Tudo do seu jeito!</h4>
                <a href="#bolosModal" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Montar meu bolo!</span></a>
            </div>
        </div>
        <!-- Slide -->
        <div class="slide">
            <div class="bg-image zooming"><img src="{{asset('site/assets/img/photos/slider-pasta_dark.jpg')}}" alt=""></div>
            <div class="container v-center">
                <h4 class="text-muted">Produto novo na área!</h4>
                <h1 class="display-2">{{$home->produtoNovo->nome}}</h1>
                <a href="#Modal{{$home->produto_novo}}" data-toggle="modal" class="btn btn-outline-primary btn-lg"><span>Peça agora</span></a>
            </div>
        </div> --}}
    </div>

</section>