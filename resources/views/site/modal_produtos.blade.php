<div class="modal fade" id="{{Str::slug($produto->nome) . Str::slug($sabor)}}Modal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="{{asset('site/assets/img/photos/modal-add.jpg')}}" alt=""></div>
                <h4 class="modal-title">{{$produto->nome}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-0">Escolha o tamanho desejado</h6>
                    </div>
                </div>
            </div>
            <div class="modal-body panel-details-container">
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsType" data-toggle="collapse">Tamanho</a>
                    </h5>
                    <div id="panelDetailsType" class="collapse show">
                        <div class="panel-details-content">
                            @foreach($produto->tamanhos as $tamanho)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="tamanho{{$produto->id}}" value="{{$tamanho->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$tamanho->nome}} - R${{number_format($tamanho->preco + $sabor->preco, 2, ",", ".")}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" onclick="adicionar({{$produto->id}}, {{$sabor->id}})"><span>Adicionar ao carrinho</span></button>
        </div>
    </div>
</div>