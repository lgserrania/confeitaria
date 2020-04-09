<div class="modal fade" id="Modal{{$produto->id}}" role="dialog">
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
                        <h6 class="mb-0">Escolha o tamanho e o sabor desejado</h6>
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
                        <a href="#panelSabores" data-toggle="collapse">Sabor</a>
                    </h5>
                    <div id="panelSabores" class="collapse show">
                        <div class="panel-details-content">
                            @foreach($produto->sabores as $sabor)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="sabor{{$produto->id}}" value="{{$sabor->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$sabor->nome}} - R${{number_format($sabor->preco, 2, ",", ".")}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelTamanhos" data-toggle="collapse">Tamanho</a>
                    </h5>
                    <div id="panelTamanhos" class="collapse">
                        <div class="panel-details-content">
                            @foreach($produto->tamanhos as $tamanho)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="tamanho{{$produto->id}}" value="{{$tamanho->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$tamanho->nome}} - R${{number_format($tamanho->preco, 2, ",", ".")}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" onclick="adicionar({{$produto->id}})"><span>Adicionar ao carrinho</span></button>
        </div>
    </div>
</div>