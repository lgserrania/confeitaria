<div class="modal fade" id="bolosModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-header-lg dark bg-dark">
                <div class="bg-image"><img src="{{asset('site/assets/img/photos/modal-add.jpg')}}" alt=""></div>
                <h4 class="modal-title">Monte seu bolo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close"></i></button>
            </div>
            <div class="modal-product-details">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h6 class="mb-0">Escolha como você quer seu bolo</h6>
                        <span class="text-muted">Tipo, Tamanho, Formato, Massa, Recheio, Cobertura e Topo</span>
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
                        <a href="#panelDetailsType" data-toggle="collapse">Tipo</a>
                    </h5>
                    <div id="panelDetailsType" class="collapse show">
                        <div class="panel-details-content">
                            @foreach(App\Categoria::all() as $categoria)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="categoria" value="{{$categoria->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$categoria->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsSize" data-toggle="collapse">Tamanhos</a>
                    </h5>
                    <div id="panelDetailsSize" class="collapse">
                        <div class="panel-details-content">
                            @foreach(App\Tamanho::all() as $tamanho)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="tamanho" value="{{$tamanho->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$tamanho->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsAdditions" data-toggle="collapse">Formatos</a>
                    </h5>
                    <div id="panelDetailsAdditions" class="collapse">
                        <div class="panel-details-content">
                            @foreach(App\Formato::all() as $formato)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="formato" value="{{$formato->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$formato->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Additions -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsMassa" data-toggle="collapse">Tipo de Massa</a>
                    </h5>
                    <div id="panelDetailsMassa" class="collapse">
                        <div class="panel-details-content">
                            @foreach(App\Massa::all() as $massa)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="massa" value="{{$massa->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$massa->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_additions" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsRecheios" data-toggle="collapse">Recheios</a>
                    </h5>
                    <div id="panelDetailsRecheios" class="collapse">
                        <div class="panel-details-content">
                            <div class="row">
                                <div class="col-sm-6">
                                    @foreach(App\Recheio::all() as $recheio)
                                        <div class="form-group">
                                            <label class="custom-control custom-checkbox">
                                                <input type="checkbox" name="recheio" class="custom-control-input" value="{{$recheio->id}}">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description">{{$recheio->nome}}</span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Size -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsCobertura" data-toggle="collapse">Cobertura</a>
                    </h5>
                    <div id="panelDetailsCobertura" class="collapse">
                        <div class="panel-details-content">
                            @foreach(App\Cobertura::all() as $cobertura)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="cobertura" value="{{$cobertura->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$cobertura->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_size" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsTopo" data-toggle="collapse">Topo</a>
                    </h5>
                    <div id="panelDetailsTopo" class="collapse">
                        <div class="panel-details-content">
                            @foreach(App\Topo::all() as $topo)
                                <div class="form-group">
                                    <label class="custom-control custom-radio">
                                        <input name="topo" value="{{$topo->id}}" type="radio" class="custom-control-input">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">{{$topo->nome}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Panel Details / Other -->
                <div class="panel-details">
                    <h5 class="panel-details-title">
                        <label class="custom-control custom-radio">
                            <input name="radio_title_other" type="radio" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                        </label>
                        <a href="#panelDetailsOther" data-toggle="collapse">Comentário/Descrição</a>
                    </h5>
                    <div id="panelDetailsOther" class="collapse">
                        <textarea cols="30" rows="4" name="mensagem" class="form-control" placeholder="Caso seja necessário, descreva aqui alguma informação adicional sobre seu bolo..."></textarea>
                    </div>
                </div>
            </div>
            <button type="button" class="modal-btn btn btn-secondary btn-block btn-lg" onclick="adicionar_bolo()" data-dismiss="modal"><span>Adicionar ao carrinho</span></button>
        </div>
    </div>
</div>

<script>

    function adicionar_bolo(){
        var _categoria = $("input[name='categoria']:checked").val();
        var _tamanho = $("input[name='tamanho']:checked").val();
        var _formato = $("input[name='formato']:checked").val();
        var _massa = $("input[name='massa']:checked").val();
        var _topo = $("input[name='topo']:checked").val();
        var _arr_recheio = [];
        $.each($("input[name='recheio']:checked"), function(){
            _arr_recheio.push($(this).val());
        });
        var _cobertura = $("input[name='cobertura']:checked").val();
        var _mensagem = $("textarea[name='mensagem']").val();
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.post( "/carrinho/adicionar/bolo",{
            categoria : _categoria,
            tamanho : _tamanho,
            formato : _formato,
            massa : _massa,
            recheio : _arr_recheio,
            cobertura : _cobertura,
            topo : _topo,
            mensagem : _mensagem
        }, function(data) {
            location.reload(true);
        });
    }

</script>