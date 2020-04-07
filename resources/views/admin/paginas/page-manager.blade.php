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
                        <a href="#" class="nav-link active"><i data-feather="monitor"></i> <span>Home</span></a>
                        <a href="#" class="nav-link"><i data-feather="monitor"></i> <span>A Confeitaria</span></a>
                        <a href="#" class="nav-link"><i data-feather="monitor"></i> <span>Produtos</span></a>
                        <a href="#" class="nav-link"><i data-feather="monitor"></i> <span>Contato</span></a>
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

                    <div class="dropdown dropdown-icon flex-fill">
                        <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Adicionar <i data-feather="chevron-down"></i></button>
                        <div class="dropdown-menu tx-13">
                            <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="image"></i><span>Imagem</span></a>
                            <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i data-feather="file"></i><span>Arquivo</span></a>
                        </div>
                    </div>

                    <div class="flex-fill mg-l-10">
                        <button class="btn btn-xs btn-block btn-primary">Salvar</button>
                    </div>

                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">


                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações da Página</label>
                    <div class="row row-xs">

                        <div class="col-6 col-sm-4 col-md-3 col-xl">
                            <div class="card card-file">

                                <div class="card-body">
                                    <h6><a class="link-02 mg-b-10">Titulo</a></h6>
                                    <input type="text" class="form-control" value="Esse é o titulo da pagina" placeholder=" Insira o Titulo">
                                </div>

                                <div class="card-body">
                                    <h6><a href="#" class="link-02 mg-b-10">SubTitulo</a></h6>
                                    <input type="text" class="form-control" value="Esse é o subtitulo da pagina" placeholder=" Insira o SubTitulo">
                                </div>

                                <div class="card-body">
                                    <h6><a class="link-02 mg-b-10">Seleção</a></h6>
                                    <select class="custom-select">
                      <option selected>Escolha uma opção</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                                </div>

                                <div class="card-body">
                                    <h6><a class="link-02 mg-b-10">Insira o valor</a></h6>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">R$</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>

                                    </div>
                                </div>

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
                                    <h6><a class="link-02 mg-b-10">Texto</a></h6>

                                    <div id="editor" class="ht-200">
                                        <strong>Quill</strong> is a free, <a href="#">open source</a> WYSIWYG editor built for the modern web. With its modular architecture and expressive API, it is completely customizable to fit any need.
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
                                    </script>
                                </div>

                                <div class="card-body">
                                    <h6>
                                        <a class="mg-b-10">Tags</a>
                                    </h6>

                                    <div class="input-group">
                                        <select class="form-control select2" multiple="multiple">
                        <option label="Choose one"></option>
                        <option value="Firefox">Firefox</option>
                        <option value="Chrome" selected>Chrome</option>
                        <option value="Safari">Safari</option>
                        <option value="Opera">Opera</option>
                        <option value="Internet Explorer" selected>Internet Explorer</option>
                      </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#modalInsertTags" type="button" id="button-addon2">Add Tags</button>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer mg-t-20"><span class="d-none d-sm-inline">Última modificação: </span>2 horas atrás</div>
                            </div>
                        </div>
                        <!-- col -->

                    </div>
                    <!-- row -->

                    <hr class="mg-y-40 bd-0">
                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Arquivos Relacionados</label>
                    <div class="row row-xs">
                        <div class="col-6 col-sm-4 col-md-3 col-xl mg-t-10 mg-sm-t-0">
                            <div class="card card-file">
                                @include('admin.includes.dropdown-image-icon')
                                <div class="card-file-thumb tx-indigo">
                                    <img src="../../assets/img/img37.jpg" class="img-fit-cover" alt="Responsive image">
                                </div>
                                <div class="card-body">
                                    <h6><a href="#modalViewDetails" data-toggle="modal" class="link-02">IMG_063037.jpg</a></h6>
                                    <span>4.1mb</span>
                                </div>
                                <div class="tx-11 tx-color-04 mg-t-10"><span class="d-none d-sm-inline">Última atualização: </span>6 horas atrás</div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-6 col-sm-4 col-md-3 col-xl mg-t-10 mg-sm-t-0">
                            <div class="card card-file">
                                @include('admin.includes.dropdown-image-icon')
                                <div class="card-file-thumb tx-indigo">
                                    <img src="../../assets/img/img38.jpg" class="img-fit-cover" alt="Responsive image">
                                </div>
                                <div class="card-body">
                                    <h6><a href="#modalViewDetails" data-toggle="modal" class="link-02">IMG_063037.jpg</a></h6>
                                    <span>4.1mb</span>
                                </div>
                                <div class="tx-11 tx-color-04 mg-t-10"><span class="d-none d-sm-inline">Última atualização: </span>6 horas atrás</div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 col-xl">
                            <div class="card card-file">
                                @include('admin.includes.dropdown-image-icon')
                                <div class="card-file-thumb tx-danger">
                                    <i class="far fa-file-pdf"></i>
                                </div>
                                <div class="card-body">
                                    <h6><a href="#modalViewDetails" data-toggle="modal" class="link-02">Medical Certificate.pdf</a></h6>
                                    <span>10.45kb</span>
                                </div>
                                <div class="card-footer"><span class="d-none d-sm-inline">Última atualização: </span>2 horas atrás</div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-6 col-sm-4 col-md-3 col-xl">
                            <div class="card card-file">
                                @include('admin.includes.dropdown-image-icon')
                                <div class="card-file-thumb tx-primary">
                                    <i class="far fa-file-word"></i>
                                </div>
                                <div class="card-body">
                                    <h6><a href="#modalViewDetails" data-toggle="modal" class="link-02">Job Contract.docx</a></h6>
                                    <span>22.67kb</span>
                                </div>
                                <div class="card-footer"><span class="d-none d-sm-inline">Última atualização: </span>5 horas atrás</div>
                            </div>
                        </div>
                        <!-- col -->
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

    });
</script>

@endsection