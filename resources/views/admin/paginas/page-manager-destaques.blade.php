@extends('admin.template.main')

@section('styles')

<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.filemgr.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

@endsection


@section('conteudo')
<div class="content-body pd-0">
    <div class="filemgr-wrapper filemgr-wrapper-two">

        <div class="filemgr-content" style="left: 0 !important;">
            <div class="filemgr-content-header">
                <h4 class="mg-b-0">Editando Destaques </h4>

                <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">

                    <div class="dropdown dropdown-icon flex-fill">
                        <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Adicionar <i data-feather="chevron-down"></i></button>
                        <div class="dropdown-menu tx-13">
                            <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="image"></i><span>Novo Destaque</span></a>
                        </div>
                    </div>

                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">


                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Destaques cadastrados</label>
                    <div class="row row-xs">
                        <div class="col-12 col-sm-12 col-md-12 col-xl">
                            <div class="card card-file">
                                <div class="card-body">
    
                                    <table id="tab-controle-pedidos" class="table table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Titulo</th>
                                                <th>Tipo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($destaques as $destaque)
                                                <tr>
                                                    <td><img src="{{asset($destaque->imagem)}}" style="width:100px" alt=""></td>
                                                    <td>{{$destaque->titulo}}</td>
                                                    <td>{{ucfirst($destaque->opcao)}}</td>
                                                    <td>
                                                        <a href="#modalEditar{{$destaque->id}}" data-toggle="modal" class="btn btn-primary" role="button">Editar</a>
                                                        <a href="{{route('painel.page.manager.destaques.deletar',['id' => $destaque->id])}}" class="btn btn-danger" style="color:white" role="button">Excluir</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
    
                                </div>
    
                                <div class="card-footer mg-t-20"><span class="d-none d-sm-inline">Última atualização:
                                    </span>2 horas atrás</div>
                            </div>
                        </div><!-- col -->
                    </div>
                    <!-- row -->

                </div>
            </div>
            <!-- filemgr-content-body -->
        </div>
        <!-- filemgr-content -->

    </div>
    <!-- filemgr-wrapper -->
</div>
</div>
<!-- content -->

@foreach($destaques as $destaque)

<div class="modal fade effect-scale" id="modalEditar{{$destaque->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <form action="{{route('painel.page.manager.destaques.atualizar', ['id' => $destaque->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-file">
                        <h4>Editando destaque</h4>

                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Título</a></h6>
                            <input type="text" class="form-control" name="titulo" value="{{$destaque->titulo}}" required>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Subtítulo</a></h6>
                            <input type="text" class="form-control" name="subtitulo" value="{{$destaque->subtitulo}}">
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Tipo</a></h6>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="opcao" id="" value="produto" @if($destaque->opcao == "produto") checked @endif required>Produto
                                    <input class="form-check-input ml-3" type="radio" name="opcao" id="" value="bolo" @if($destaque->opcao == "bolo") checked @endif required>Bolo
                                    <input class="form-check-input ml-3" type="radio" name="opcao" id="" value="outros" @if($destaque->opcao == "outros") checked @endif required>Outros
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h6 class="mb-2">Selecione o produto que está em pronta entrega</h6>
                                <select class="form-control" name="produto_id" id="produto_pronta_entrega">
                                    <option value="">Selecione o produto</option>
                                    @foreach(\App\Produto::all() as $produto)
                                        <option value="{{$produto->id}}" @if($destaque->produto_id == $produto->id) selected @endif>{{$produto->nome}}</option>
                                    @endforeach
                                </select>
                                <small>Apenas se a opção selecionada for Produto</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Texto do botão que contem o link</a></h6>
                            <input type="text" class="form-control" name="texto_link" value="{{$destaque->texto_link}}" placeholder="Ex: Compre agora">
                            <small>Informe sempre para produto e bolo. No caso de Outros, informe apenas se necessário</small>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Direcionamento</a></h6>
                            <input type="text" class="form-control" name="link" value="{{$destaque->link}}" placeholder="https://google.com">
                            <small>Informe apenas se a opção escolhida for Outros</small>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Imagem de fundo</a></h6>
                            <div class="form-group">
                            <input type="file" class="form-control-file" name="imagem" id="" placeholder="" aria-describedby="fileHelpId">
                            <small id="fileHelpId" class="form-text text-muted">Escolha a imagem de fundo do destaque</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->

@endforeach

<div class="modal fade effect-scale" id="modalViewDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <form action="{{route('painel.page.manager.destaques.novo')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-file">
                        <h4>Criação de destaque</h4>

                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Título</a></h6>
                            <input type="text" class="form-control" name="titulo" placeholder="Ex: Investir no seu negócio é o caminho para o sucesso!" required>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Subtítulo</a></h6>
                            <input type="text" class="form-control" name="subtitulo" placeholder="Ex: +FOCO">
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Tipo</a></h6>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="opcao" id="" value="produto" required>Produto
                                    <input class="form-check-input ml-3" type="radio" name="opcao" id="" value="bolo" required>Bolo
                                    <input class="form-check-input ml-3" type="radio" name="opcao" id="" value="outros" required>Outros
                                </label>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <h6 class="mb-2">Selecione o produto que está em pronta entrega</h6>
                                <select class="form-control" name="produto_id" id="produto_pronta_entrega">
                                    <option value="">Selecione o produto</option>
                                    @foreach(\App\Produto::all() as $produto)
                                        <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                    @endforeach
                                </select>
                                <small>Apenas se a opção selecionada for Produto</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Texto do botão que contem o link</a></h6>
                            <input type="text" class="form-control" name="texto_link" placeholder="Ex: Compre agora">
                            <small>Informe sempre para produto e bolo. No caso de Outros, informe apenas se necessário</small>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Direcionamento</a></h6>
                            <input type="text" class="form-control" name="link" placeholder="https://google.com">
                            <small>Informe apenas se a opção escolhida for Outros</small>
                        </div>
                        <div class="card-body">
                            <h6><a class="link-02 mg-b-10">Imagem de fundo</a></h6>
                            <div class="form-group">
                            <input type="file" class="form-control-file" name="imagem" id="" placeholder="" aria-describedby="fileHelpId" required>
                            <small id="fileHelpId" class="form-text text-muted">Escolha a imagem de fundo do destaque</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->
@endsection

@section('scripts')

<script src="{{asset('admin/lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/lib/datatables.net-dt/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/dashforge.filemgr.js')}}"></script>

<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
<script src="{{asset('admin/lib/select2/js/select2.min.js')}}"></script>

<script>
    'use strict'

    $(document).ready(function(){
        if(window.matchMedia('(min-width: 1200px)').matches) {
            $('.aside').addClass('minimize');
        }
    })
</script>

<script>
     
    $(function(){
        'use strict'

        // Basic with search
        $('.select2').select2({
            placeholder: 'Choose one',
            searchInputPlaceholder: 'Search options'
        });

        $("#salvar").click(function(){
            $("#form_home").submit();
        });

        $('#tab-controle-pedidos').DataTable({
            language: {
              searchPlaceholder: 'Pesquisar...',
              sSearch: '',
              lengthMenu: '_MENU_ items/page',
            }
        });
    
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>

@endsection