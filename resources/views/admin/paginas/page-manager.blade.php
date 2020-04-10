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

            <div class="filemgr-sidebar-body" style="position: initial;">
                <div class="pd-t-20 pd-b-10 pd-x-10">
                    <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Minhas páginas</label>
                    <nav class="nav nav-sidebar tx-13">
                        <a href="{{route('painel.page.manager')}}" class="nav-link active"><i data-feather="monitor"></i> <span>Home</span></a>
                        <a href="{{route('painel.page.manager.sobre')}}" class="nav-link"><i data-feather="monitor"></i> <span>Sobre Nós</span></a>
                        <a href="{{route('painel.page.manager.galeria')}}" class="nav-link"><i data-feather="monitor"></i> <span>Galeria</span></a>
                        <a href="{{route('painel.page.manager.contato')}}" class="nav-link"><i data-feather="monitor"></i> <span>Contato</span></a>
                    </nav>
                </div>

            </div>
            <!-- filemgr-sidebar-body -->

        </div>
        <!-- filemgr-sidebar -->

        <div class="filemgr-content">
            <div class="filemgr-content-header">
                <h4 class="mg-b-0">Editando Home </h4>

                <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">

                    <div class="flex-fill mg-l-10">
                        <button id="salvar" class="btn btn-xs btn-block btn-primary">Salvar</button>
                    </div>

                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">
                    @if(session()->get("erro"))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{session()->get("erro")}}</strong>
                        </div>
                    @endif
                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações da Página</label>
                    <div class="row row-xs">
                        <div class="col-12 col-sm-12 col-md-12 col-xl">
                            <div class="card card-file">
                                <div class="card-body">
                                    <h3>Destacar categorias</h3>
                                    <hr>
                                    <span class="mb-2">Obs: Para trocar a imagem de uma categoria, basta clicar na imagem</span>
                                    <table id="tab-controle-pedidos" class="table table-hover">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Imagem</th>
                                                <th>Categoria</th>
                                                <th>Destaque</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @foreach($categorias as $categoria)
                                                <tr>
                                                    <td>
                                                        @if($categoria->imagem)
                                                        <a href="#modalImagemCategoria{{$categoria->id}}" data-toggle="modal"><img src="{{asset($categoria->imagem)}}" style="width:100px" alt=""></a>
                                                        @else
                                                            <a href="#modalImagemCategoria{{$categoria->id}}" data-toggle="modal" class="btn btn-primary">Adicionar imagem</a>
                                                        @endif
                                                    </td>
                                                    <td>{{$categoria->nome}}</td>
                                                    <td>
                                                        @if($categoria->destaque == "0")
                                                            <a href="{{route('painel.page.manager.categoria.destaque', ['id' => $categoria->id])}}"><i class="fa fa-star" style="color:grey" aria-hidden="true"></i></a>
                                                        @else
                                                            <a href="{{route('painel.page.manager.categoria.destaque', ['id' => $categoria->id])}}"><i class="fa fa-star" style="color:orange" aria-hidden="true"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div>
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

@foreach($categorias as $categoria)

<div class="modal fade effect-scale" id="modalImagemCategoria{{$categoria->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar imagem à categoria</h5>

                <div class="row mg-b-10">
                    <div class="col-12">
                        <form action="{{route('painel.page.manager.categoria.imagem.adicionar', ['id' => $categoria->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" class="custom-file-input" name="imagem" id="customFile">
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
@endforeach

<div class="modal fade effect-scale" id="modalViewDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Detalhes</h5>

                <div class="row mg-b-10">
                    <div class="col-4">Nome do Arquivo:</div>
                    <div class="col-8">Medical Certificate.pdf</div>
                </div>
                <!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Tipo do Arquivo:</div>
                    <div class="col-8">PDF File</div>
                </div>
                <!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Peso do Arquivo:</div>
                    <div class="col-8">10.45 KB</div>
                </div>
                <!-- row -->
                <div class="row mg-b-10">
                    <div class="col-4">Upload:</div>
                    <div class="col-7">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Escolha o Arquivo</label>
                    </div>
                </div>
                <!-- row -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
            </div>
            <!-- modal-footer -->
        </div>
        <!-- modal-content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->


<div class="modal fade effect-scale" id="modalInsertTags" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar Tags</h5>

                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Nova Tag</a></h6>
                    <input type="text" class="form-control" placeholder="Insira a Tag aqui">
                </div>
                <hr>
                <!-- Linha de divisão -->
                <div class="card-body">
                    <h6><a class="link-02 mg-b-10">Tags Existentes</a></h6>

                    <ul class="list-group">
                        <li class="list-group-item">Chrome</li>
                        <li class="list-group-item">Safari</li>
                        <li class="list-group-item">Internet Explorer</li>
                        <li class="list-group-item">Firefox</li>
                        <li class="list-group-item">Opera</li>
                        <li class="list-group-item">Chrome</li>
                        <li class="list-group-item">Safari</li>
                        <li class="list-group-item">Internet Explorer</li>
                        <li class="list-group-item">Firefox</li>
                        <li class="list-group-item">Opera</li>
                    </ul>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Fechar</button>
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