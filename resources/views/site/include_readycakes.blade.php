<section class="section bg-light">

    <div class="container">
        <h1 class="text-center mb-6">Ofertas Especiais</h1>
        <!-- Carousel -->
        <div class="carousel carousel-items" data-slick='{
                "slidesToShow": 3, 
                "slidesToScroll": 1,
                "dots": true,
                "arrows": false,
                "responsive": [
                    {
                        "breakpoint": 991,
                        "settings": {
                            "slidesToShow": 2
                        }
                    },
                    {
                        "breakpoint": 575,
                        "settings": {
                            "slidesToShow": 1
                        }
                    }
                ]
            }'>
            @foreach(\App\Produto::where("destaque","1")->get() as $produto)
                <div class="carousel-item">
                    <img src="{{asset($produto->imagem_destaque)}}" class="rounded" alt="">
                    <blockquote class="blockquote blockquote-lg" data-center-top="filter: blur(0); transform: scale(1);" data-bottom-top="transform: scale(0.9);">
                        <div class="blockquote-content">
                            <h2>{{$produto->nome}}</h2>
                            <ul style="list-style-type: none; padding-left: 0px;">
                                @php  
                                    $preco_tamanho = $produto->tamanhos->min("preco");
                                    $preco_sabor = $produto->sabores->min("preco");
                                @endphp
                                <li>Preços a partir de R${{number_format($preco_tamanho + $preco_sabor, "2", ".", ",")}}</li>
                            </ul><br>
                            <a href="#Modal{{$produto->id}}" data-toggle="modal" class="btn btn-outline-primary"><span>Peça agora</span></a>
                        </div>
                    </blockquote>
                </div>
            @endforeach
        </div>
    </div>



</section>