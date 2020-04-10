@extends('admin.template.main')

@section('styles')

<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.filemgr.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


@endsection


@section('conteudo')
<div class="content-body pd-0">
    <div class="filemgr-wrapper filemgr-wrapper-two">
        <div class="filemgr-sidebar">

            <div class="filemgr-sidebar-body" style="position: initial;">
                <div class="pd-t-20 pd-b-10 pd-x-10">
                    <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Minhas páginas</label>
                    <nav class="nav nav-sidebar tx-13">
                        <a href="{{route('painel.page.manager')}}" class="nav-link"><i data-feather="monitor"></i> <span>Home</span></a>
                        <a href="{{route('painel.page.manager.sobre')}}" class="nav-link active"><i data-feather="monitor"></i> <span>Sobre Nós</span></a>
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
                        <button id="salvar_sobre" class="btn btn-xs btn-block btn-primary">Salvar</button>
                    </div>

                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">


                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações da Página</label>
                    <div class="row row-xs">
                        
                        @if(!$sobre)
                            <form id="form_sobre" action="{{route('painel.page.manager.sobre.salvar')}}" method="POST" style="width:100%">
                                @csrf
                                <div class="col-6 col-sm-4 col-md-3 col-xl">
                                    <div class="card card-file">

                                        <div class="card-body">
                                            <h6>Título Principal</h6>
                                            <input type="text" class="form-control" name="titulo_principal" value="" placeholder="Primeira frase escrita bem grande na página" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Subtítulo Principal</h6>
                                            <input type="text" class="form-control" name="subtitulo_principal" value="" placeholder="Ficará abaixo do título principal" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Título Secundario</h6>
                                            <input type="text" class="form-control" name="titulo_secundario" value="" placeholder="Título grande antes do texto" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Sobre</h6>
                                            <textarea name="texto" id="sobre-editor" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                            </form>
                        @else
                            <form id="form_sobre" action="{{route('painel.page.manager.sobre.salvar')}}" method="POST" style="width:100%">
                                @csrf
                                <div class="col-6 col-sm-4 col-md-3 col-xl">
                                    <div class="card card-file">

                                        <div class="card-body">
                                            <h6>Título Principal</h6>
                                            <input type="text" class="form-control" name="titulo_principal" value="{{$sobre->titulo_principal}}" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Subtítulo Principal</h6>
                                            <input type="text" class="form-control" name="subtitulo_principal" value="{{$sobre->subtitulo_principal}}" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Título Secundario</h6>
                                            <input type="text" class="form-control" name="titulo_secundario" value="{{$sobre->titulo_secundario}}" required>
                                        </div>

                                        <div class="card-body">
                                            <h6>Sobre</h6>
                                            <textarea name="texto" id="sobre-editor" required>{{$sobre->texto}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                            </form>
                        @endif
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

        $("#salvar_sobre").click(function(){
            $("#form_sobre").submit();
        });

        CKEDITOR.replace( 'texto' );

    });
</script>

@endsection