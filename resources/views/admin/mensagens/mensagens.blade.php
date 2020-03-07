@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link href="{{asset('admin/lib/quill/quill.core.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/quill/quill.snow.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.mail.css')}}">
@endsection

@section('conteudo')
<div class="content-body pd-0">
    <div class="mail-wrapper mail-wrapper-two">
        <div class="mail-sidebar">
            <div class="mail-sidebar-body">
                <div class="pd-b-10 pd-x-10 mg-t-20">
                    <nav class="nav nav-sidebar tx-13">
                        <a href="#" class="nav-link active"><i data-feather="inbox"></i> <span>Todas</span> <span
                                class="badge">{{$todas->count()}}</span></a>
                        <a href="#" class="nav-link"><i data-feather="check-square"></i> <span>Lidas</span> <span
                                class="badge">{{$todas->where("lida","=","1")->count()}}</span></a>
                        <a href="#" class="nav-link"><i data-feather="slash"></i> <span>Não Lidas</span> <span
                                class="badge">{{$todas->where("lida","=","0")->count()}}</span></a>
                    </nav>
                </div>

                <div class="pd-10">
                    <label
                        class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Categorias</label>
                    <nav class="nav nav-sidebar tx-13">
                        <a href="{{route('painel.utilitarios.mensagens.categoria', ['categoria' => 'duvidas'])}}" class="nav-link"><i data-feather="folder"></i> <span>Dúvidas</span><span
                                class="badge">{{$todas->where("assunto","=","duvidas")->count()}}</span></a>
                        <a href="{{route('painel.utilitarios.mensagens.categoria', ['categoria' => 'parcerias'])}}" class="nav-link"><i data-feather="folder"></i> <span>Parcerias</span><span
                                class="badge">{{$todas->where("assunto","=","parcerias")->count()}}</span></a>
                        <a href="{{route('painel.utilitarios.mensagens.categoria', ['categoria' => 'reclamacoes'])}}" class="nav-link"><i data-feather="folder"></i> <span>Reclamações</span><span
                                class="badge">{{$todas->where("assunto","=","reclamacoes")->count()}}</span></a>
                        <a href="{{route('painel.utilitarios.mensagens.categoria', ['categoria' => 'outros'])}}" class="nav-link"><i data-feather="folder"></i> <span>Outros</span><span
                                class="badge">{{$todas->where("assunto","=","outros")->count()}}</span></a>
                    </nav>
                </div>

            </div><!-- mail-sidebar-body -->
        </div><!-- mail-sidebar -->

        <div class="mail-group">
            <div class="mail-group-header justify-content-between">
                <h6 class="tx-uppercase tx-semibold mg-b-0">Mensagens</h6>
            </div><!-- mail-group-header -->
            <div class="mail-group-body">
                @php
                    $data_atual = "";
                @endphp
                @foreach($mensagens as $mensagem)
                    @if(date('d/m/Y', strtotime($mensagem->created_at)) != $data_atual)
                        <label class="mail-group-label">{{date('d/m/Y', strtotime($mensagem->created_at))}}</label>
                        <ul class="list-unstyled media-list mg-b-0">
                    @endif
                    <li class="media @if(!$mensagem->lida)unread @endif" onclick="ler({{$mensagem->id}})">
                        <input type="hidden" name="nome" value="{{$mensagem->nome}}">
                        <input type="hidden" name="assunto" value="{{$mensagem->assunto}}">
                        <input type="hidden" name="email" value="{{$mensagem->email}}">
                        <input type="hidden" name="mensagem" value="{{$mensagem->mensagem}}">
                        <input type="hidden" name="data" value="{{date('d/m/Y - H:i', strtotime($mensagem->created_at))}}">
                        <input type="hidden" name="telefone" value="{{$mensagem->telefone}}">
                        <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">{{ $mensagem->nome[0] }}</span></div>
                        <div class="media-body mg-l-15">
                            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                                <span class="tx-12">{{ $mensagem->nome }}</span>
                                <span class="tx-11">{{ date("H:i", strtotime($mensagem->created_at)) }}</span>
                            </div>
                            <h6 class="tx-13">{{ $mensagem->assunto }}</h6>
                            <p class="tx-12 tx-color-03 mg-b-0"> {{$mensagem->mensagem}} </p>
                        </div><!-- media-body -->
                    </li>
                    @if(date('d/m/Y - H:i', strtotime($mensagem->created_at)) != $data_atual)    
                        </ul>
                        @php
                            $data_atual = date('d/m/Y', strtotime($mensagem->created_at));
                        @endphp
                    @endif
                @endforeach
                <div class="pd-t-1 pd-b-5 pd-x-5">
                    <a href="#"
                        class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0">Carregar
                        mais</a>
                </div>
            </div><!-- mail-group-body -->
        </div><!-- mail-group -->

        <div class="mail-content">
            <div class="mail-content-header d-none">
                <a href="#" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i
                        data-feather="arrow-left"></i></a>
                <div class="media">
                    <div class="avatar avatar-sm"><img src="../../assets/img/img7.jpg" class="rounded-circle" alt="">
                    </div>
                    <div class="media-body mg-l-10">
                        <h6 class="mg-b-2 tx-13" id="nomeTopo"></h6>
                        <span class="d-block tx-11 tx-color-03" id="dataTopo">Hoje, 11:40</span>
                    </div><!-- media-body -->
                </div><!-- media -->
                <nav class="nav nav-icon-only mg-l-auto">
                    <a href="#" data-toggle="tooltip" title="Marcar como lida" class="nav-link d-none d-sm-block"><i
                            data-feather="check-square"></i></a>
                    <a href="#" data-toggle="tooltip" title="Marcar não lida" class="nav-link d-none d-sm-block"><i
                            data-feather="slash"></i></a>
                    <a href="#" data-toggle="tooltip" title="Enviar email" class="nav-link d-none d-sm-block"><i
                            data-feather="mail"></i></a>
                    <span class="nav-divider d-none d-sm-block"></span>
                    <a href="#" data-toggle="tooltip" title="Favoritar Contato" class="nav-link d-none d-sm-block"><i
                            data-feather="star"></i></a>
                    <a href="#" data-toggle="tooltip" title="Apagar" class="nav-link d-none d-sm-block"><i
                            data-feather="trash"></i></a>
                    <a href="#" data-toggle="tooltip" title="Imprimir" class="nav-link d-none d-sm-block"><i
                            data-feather="printer"></i></a>
                </nav>
            </div><!-- mail-content-header -->
            <div class="mail-content-body d-none">
                <div class="pd-20 pd-lg-25 pd-xl-30">
                    <h5 class="mg-b-30" id="assuntoMensagem">Assunto da Mensagem aqui</h5>

                    <h6 class="tx-semibold mg-b-0">Nome</h6>
                    <p class="tx-color-03" id="nomeMensagem">Nome da pessoa</p>

                    <h6 class="tx-semibold mg-b-0">Telefone</h6>
                    <p class="tx-color-03" id="telefoneMensagem">(35) 9 9898-9898</p>

                    <h6 class="tx-semibold mg-b-0">Email</h6>
                    <p class="tx-color-03" id="emailMensagem"></p>

                    <h6 class="tx-semibold mg-b-0">Mensagem</h6>
                    <p id="mensagemMensagem"></p>
                </div>
            </div><!-- mail-content-body -->
        </div><!-- mail-content -->
    </div><!-- mail-wrapper -->
</div>
@endsection

@section('scripts')
<script src="{{asset('admin/quill/quill.min.js')}}"></script>
<script src="{{asset('admin/js/dashforge.mail.js')}}"></script>
<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
<script>
    'use strict'

    function ler(id){
        $.get( "/painel/utilitarios/mensagens/lida/" + id, function( data ) {
        });
    }

    $(document).ready(function(){
      if(window.matchMedia('(min-width: 1200px)').matches) {
        $('.aside').addClass('minimize');
      }
    })
</script>
@endsection