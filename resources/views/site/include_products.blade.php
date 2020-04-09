<section class="section pb-0 protrude">

    <div class="container">
        <h1 class="mb-6">Escolha o seu</h1>
    </div>

    <div class="menu-sample-carousel carousel inner-controls" data-slick='{
                        "dots": true,
                        "slidesToShow": 3,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "responsive": [
                            {
                                "breakpoint": 991,
                                "settings": {
                                    "slidesToShow": 2,
                                    "slidesToScroll": 1
                                }
                            },
                            {
                                "breakpoint": 690,
                                "settings": {
                                    "slidesToShow": 1,
                                    "slidesToScroll": 1
                                }
                            }
                        ]
                    }'>
        <!-- Menu Sample -->
        @foreach(\App\CategoriaProduto::where("destaque","1")->get() as $categoria)
        <div class="menu-sample text-right">
            <a href="{{route('produtos.categoria', ['slug' => $categoria->slug])}}">
                <img src="{{asset($categoria->imagem)}}" alt="" class="image">
                <h3 class="title">{{$categoria->nome}}</h3>
            </a>
        </div>
        @endforeach
    </div>

</section>