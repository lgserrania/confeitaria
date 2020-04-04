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
        <div class="filemgr-sidebar">

            <div class="filemgr-sidebar-header">

                <div class="dropdown dropdown-icon flex-fill mg-l-10">
                    <button class="btn btn-xs btn-block btn-primary" data-toggle="dropdown">Novo<i
                            data-feather="chevron-down"></i></button>
                    <div class="dropdown-menu tx-13">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalInsereProduto"><i data-feather="box"></i><span>Produto</span></a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modalInsereCategoria"><i data-feather="folder"></i><span>Categoria</span></a>
                    </div>
                    <!-- dropdown-menu -->
                </div>
                <!-- dropdown -->
            </div>
            <!-- filemgr-sidebar-header -->


            <div class="filemgr-sidebar-body">
                @foreach($categorias as $categoria)
                    <div class="pd-t-20 pd-b-10 pd-x-10">
                        <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">{{$categoria->nome}}</label>
                        <nav class="nav nav-sidebar tx-13">
                            @foreach($categoria->produtos->sortBy("nome") as $cat_produto)
                                <a href="{{route('painel.produtos.variados.editar', ['id' => $cat_produto->id])}}" class="nav-link"><i data-feather="box"></i> <span>{{$cat_produto->nome}}</span></a>
                            @endforeach
                        </nav>
                    </div>
                @endforeach
            </div>
            <!-- filemgr-sidebar-body -->

        </div>
        <!-- filemgr-sidebar -->

        <div class="filemgr-content">
            <div class="filemgr-content-header">
                @if($editar)
                    <h4 class="mg-b-0">Editando Produtos </h4>
                    
                    <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">

                        <div class="dropdown dropdown-icon flex-fill">
                            <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Adicionar <i
                                    data-feather="chevron-down"></i></button>
                            <div class="dropdown-menu tx-13">
                                <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i
                                        data-feather="image"></i><span>Imagem</span></a>
                            </div>
                        </div>

                        <div class="flex-fill mg-l-10">
                            <button class="btn btn-xs btn-block btn-primary" id="produto-salvar">Salvar</button>
                        </div>
                        
                        <div class="flex-fill mg-l-10">
                            <a href="{{route('painel.produtos.variados.excluir', ['id' => $produto->id])}}" class="btn btn-xs btn-block btn-danger" id="produto-salvar">Excluir</a>
                        </div>

                    </nav>
                @endif
            </div>
            <!-- filemgr-content-header -->
            @if($editar)
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">

                    
                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações
                        do Produto</label>
                    <form id="form-produto" action="{{route('painel.produtos.variados.atualizar', ['id' => $produto->id])}}" method="POST">
                        <div class="row row-xs">
                            @csrf
                            <input type="hidden" name="descricao" id="descricao">
                            <div class="col-6 col-sm-4 col-md-3 col-xl">
                                <div class="card card-file">

                                    <div class="card-body">
                                        <h6><a class="link-02 mg-b-10">Categoria</a></h6>
                                        <select class="custom-select" name="categoria_id">
                                            @foreach($categorias as $categoria)
                                                <option @if($categoria->id == $produto->categoria_id) selected @endif value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="card-body">
                                        <h6><a class="link-02 mg-b-10">Titulo</a></h6>
                                        <input type="text" class="form-control" name="nome" value="{{$produto->nome}}" placeholder=" Insira o Titulo">
                                    </div>

                                    <div class="card-body">
                                        <h6><a href="#" class="link-02 mg-b-10">SubTitulo</a></h6>
                                        <input type="text" class="form-control" name="subtitulo" value="{{$produto->subtitulo}}" placeholder=" Insira o SubTitulo">
                                    </div>


                                    <!-- tags -->
                                    <div class="card-body">
                                        <h6>
                                            <a class="mg-b-10">Tamanhos</a>
                                        </h6>
                                        <div class="input-group">
                                            <select class="form-control select2" multiple="multiple">
                                                @foreach($produto->tamanhos as $tamanho)
                                                    <option data-toggle="modal" data-target="#modalEditaTamanho{{$tamanho->id}}">{{$tamanho->nome}}</option>                   
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsereTamanho" type="button" id="button-addon2">Add
                                                    Tamanho</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tags -->
                                        
                                    <!-- tags -->
                                    <div class="card-body">
                                        <h6>
                                            <a class="mg-b-10">Sabores</a>
                                        </h6>
                                        <div class="input-group">
                                            <select class="form-control select2" multiple="multiple">
                                                @foreach($produto->sabores as $sabor)
                                                    <option data-toggle="modal" data-target="#modalEditaSabor{{$tamanho->id}}">{{$sabor->nome}}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsereSabor" type="button" id="button-addon2">Add
                                                    Sabor</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- tags -->
                                    <!-- descrição -->
                                    <script>
                                        var quill = new Quill('#editor-container', {
                                            modules: {
                                                toolbar: '#toolbar-container'
                                            },
                                            placeholder: 'Compose an epic...',
                                            theme: 'snow'
                                        });
                                    </script>

                                    <div class="card-body">
                                        <h6><a class="link-02 mg-b-10">Descrição</a></h6>

                                        <div id="editor" class="ht-200">
                                        </div>

                                        <!-- Include the Quill library -->
                                        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

                                        <!-- Initialize Quill editor -->
                                        <script>
                                            var quill2 = new Quill('#editor', {
                                                modules: {
                                                    toolbar: [
                                                        ['bold', 'italic'],
                                                        ['link', 'blockquote', 'code-block', 'image'],
                                                        [{
                                                            list: 'ordered'
                                                        }, {
                                                            list: 'bullet'
                                                        }]
                                                    ]
                                                },
                                                placeholder: 'Compose an epic...',
                                                theme: 'snow'
                                            });
                                            quill2.setContents({!! $produto->descricao !!});
                                        </script>
                                    </div>
                                    <!-- descrição -->
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </form>
                    <!-- row -->

                    <hr class="mg-y-40 bd-0">
                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Arquivos
                        Relacionados</label>
                    <div class="row row-xs">
                        @foreach($produto->imagens as $imagem)
                            <div class="col-sm-4 col-md-3 col-xl-3 mg-t-10 mg-sm-t-0">
                                <div class="card card-file">
                                    <?php  @include('admin.includes.dropdown-image-icon') ?>
                                    <div class="card-file-thumb tx-indigo">
                                        <img src="{{asset($imagem->caminho)}}" class="img-fit-cover">
                                    </div>
                                    <a href="{{route('painel.produtos.imagem.excluir', ['id' => $imagem->id])}}" style="position:absolute; top:0px; right:5px;color:red;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- row -->

                </div>
            </div>
            @endif
            <!-- filemgr-content-body -->
        </div>
        <!-- filemgr-content -->

    </div>
    <!-- filemgr-wrapper -->
</div>
</div>
<!-- content -->
@if($editar)
    @foreach($produto->tamanhos as $tamanho)

        <div class="modal fade effect-scale" id="modalEditaTamanho{{$tamanho->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body pd-20 pd-sm-30">
                        <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h5 class="tx-18 tx-sm-20 mg-b-30">Editar Tamanho</h5>

                        <form action="{{route('painel.produtos.tamanho.editar', ['id' => $tamanho->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="produto_id" value="{{$produto->id}}">
                            <div class="form-group">
                            <label for="nome">Identificador</label>
                            <input type="text" class="form-control" name="nome" aria-describedby="helpId" value="{{$tamanho->nome}}">
                            </div>
                            <div class="form-group">
                                <label for="nome">Preço</label>
                                <input type="text" class="form-control" name="preco" aria-describedby="helpId" value="{{$tamanho->preco}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{route('painel.produtos.tamanho.excluir', ['id' => $tamanho->id])}}" class="btn btn-danger">Excluir</a>
                        </form>

                    </div>
                    <!-- modal-footer -->
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
    @endforeach

    @foreach($produto->sabores as $sabor)

        <div class="modal fade effect-scale" id="modalEditaSabor{{$tamanho->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body pd-20 pd-sm-30">
                        <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <h5 class="tx-18 tx-sm-20 mg-b-30">Editar Sabor</h5>

                        <form action="{{route('painel.produtos.sabor.editar', ['id' => $sabor->id])}}" method="post">
                            @csrf
                            <input type="hidden" name="produto_id" value="{{$produto->id}}">
                            <div class="form-group">
                            <label for="nome">Identificador</label>
                            <input type="text" class="form-control" name="nome" aria-describedby="helpId" value="{{$sabor->nome}}">
                            </div>
                            <div class="form-group">
                                <label for="nome">Preço</label>
                                <input type="text" class="form-control" name="preco" aria-describedby="helpId" value="{{$sabor->preco}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <a href="{{route('painel.produtos.sabor.excluir', ['id' => $sabor->id])}}" class="btn btn-danger">Excluir</a>
                        </form>

                    </div>
                    <!-- modal-footer -->
                </div>
                <!-- modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
    @endforeach
@endif
<!-- modal -->
<div class="modal fade effect-scale" id="modalInsereProduto" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Novo Produto</h5>

                <form action="{{route('painel.produtos.salvar')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nome">Titulo</label>
                      <input type="text" class="form-control" name="nome" placeholder="Titulo do produto">
                    </div>
                    <div class="form-group">
                        <label for="nome">Subtitulo</label>
                        <input type="text" class="form-control" name="subtitulo" placeholder="Subtitulo do produto">
                    </div>
                    <div class="form-group">
                      <label for="categoria_id">Categoria</label>
                      <select class="form-control" name="categoria_id">
                        @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
                </form>

            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->

<div class="modal fade effect-scale" id="modalInsereCategoria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Nova Categoria</h5>

                <form action="{{route('painel.produtos.categoria.salvar')}}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="nome">Nome da Categoria</label>
                      <input type="text" class="form-control" name="nome" aria-describedby="helpCategoria" placeholder="Ex: No pote">
                      <small id="helpCategoria" class="form-text text-muted">Insira o nome desejado para a categoria</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
                </form>

            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->

@if($editar)
<div class="modal fade effect-scale" id="modalViewDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar imagem ao produto</h5>

                <div class="row mg-b-10">
                    <div class="col-12">
                        <form action="{{route('painel.produtos.imagem.salvar')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="produto_id" value="{{$produto->id}}">
                            <input type="file" class="custom-file-input" name="caminho" id="customFile">
                            <label class="custom-file-label" for="customFile">Escolha o Arquivo</label>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Salvar</button>
                        </form>
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->

<div class="modal fade effect-scale" id="modalInsereTamanho" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Tamanho</h5>

                <div class="card-body">
                    <form action="{{route('painel.produtos.tamanho.salvar')}}" method="post">
                        @csrf
                        <input type="hidden" name="produto_id" value="{{$produto->id}}">
                        <div class="form-group">
                          <label for="nome">Identificador</label>
                          <input type="text" class="form-control" name="nome" aria-describedby="helpId" placeholder="Ex: Pequeno">
                        </div>
                        <div class="form-group">
                            <label for="nome">Preço</label>
                            <input type="text" class="form-control" name="preco" aria-describedby="helpId" placeholder="Ex: 20.00">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>

<div class="modal fade effect-scale" id="modalInsereSabor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Sabor</h5>

                <div class="card-body">
                    <form action="{{route('painel.produtos.sabor.salvar')}}" method="post">
                        @csrf
                        <input type="hidden" name="produto_id" value="{{$produto->id}}">
                        <div class="form-group">
                          <label for="nome">Identificador</label>
                          <input type="text" class="form-control" name="nome" aria-describedby="helpId" placeholder="Ex: Pequeno">
                        </div>
                        <div class="form-group">
                            <label for="nome">Preço</label>
                            <input type="text" class="form-control" name="preco" aria-describedby="helpId" placeholder="Ex: 20.00">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
@endif
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
    $(function(){
        'use strict'
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

  <script>
    'use strict'
    function mostra(id){
        $(".filemgr-content-body").css("display","block");
    }
    $(document).ready(function(){
        if(window.matchMedia('(min-width: 1200px)').matches) {
            $('.aside').addClass('minimize');
        }  

        $("#produto-salvar").click(function(){
            var descricao = JSON.stringify(quill2.getContents());
            $("#descricao").val(descricao);
            $("#form-produto").submit();
        });
    })
  </script>
@endsection