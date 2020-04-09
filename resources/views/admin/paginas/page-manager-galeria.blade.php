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
                        <a href="{{route('painel.page.manager.sobre')}}" class="nav-link"><i data-feather="monitor"></i> <span>Sobre Nós</span></a>
                        <a href="{{route('painel.page.manager.galeria')}}" class="nav-link active"><i data-feather="monitor"></i> <span>Galeria</span></a>
                        <a href="{{route('painel.page.manager.contato')}}" class="nav-link"><i data-feather="monitor"></i> <span>Contato</span></a>
                    </nav>
                </div>

            </div>
            <!-- filemgr-sidebar-body -->

        </div>
        <!-- filemgr-sidebar -->

        <div class="filemgr-content">
            <div class="filemgr-content-header">
                <h4 class="mg-b-0">Editando galeria </h4>

                <nav class="nav d-none d-sm-flex mg-r-auto mg-l-15">

                    <div class="dropdown dropdown-icon flex-fill">
                        <button class="btn btn-xs btn-block btn-white" data-toggle="dropdown">Adicionar <i
                                data-feather="chevron-down"></i></button>
                        <div class="dropdown-menu tx-13">
                            <a href="#modalViewDetails" data-toggle="modal" class="dropdown-item details"><i
                                    data-feather="image"></i><span>Imagem</span></a>
                        </div>
                    </div>

                </nav>

            </div>
            <!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">


                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Informações da Página</label>
                    <div class="row row-xs">
                        @foreach($fotos as $foto)
                            <div class="col-sm-4 col-md-3 col-xl-3 mg-t-10 mg-sm-t-0">
                                <div class="card card-file">
                                    <?php  @include('admin.includes.dropdown-image-icon') ?>
                                    <div class="card-file-thumb tx-indigo">
                                        <img src="{{asset($foto->imagem)}}" class="img-fit-cover">
                                    </div>
                                    <a href="{{route('painel.page.manager.galeria.excluir', ['id' => $foto->id])}}" style="position:absolute; top:0px; right:5px;color:red;"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        @endforeach
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
<div class="modal fade effect-scale" id="modalViewDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-30">Adicionar imagem à galeria</h5>

                <div class="row mg-b-10">
                    <div class="col-12">
                        <form action="{{route('painel.page.manager.galeria.adicionar')}}" method="post" enctype="multipart/form-data">
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