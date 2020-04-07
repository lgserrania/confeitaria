@extends('admin.template.main')

@section('styles')
<link href="{{asset('admin/lib/datatables.net-dt/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/lib/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/css/dashforge.demo.css')}}"><!-- select -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.profile.css')}}"><!-- detalhes pedidos -->
<link rel="stylesheet" href="{{asset('admin/css/dashforge.contacts.css')}}">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('conteudo')
<div class="content-body pd-0">
    <div class="contact-wrapper contact-wrapper-two">
        <div class="contact-navleft">
            <nav class="nav flex-column">
                <a href="#tabContact" class="nav-link active" data-toggle="tab">
                    <span data-toggle="tooltip" title="Todos Contatos" data-placement="right"><i
                            data-feather="users"></i></span>
                </a>
                {{--  <a href="#tabPhoneCall" class="nav-link" data-toggle="tab">
                    <span data-toggle="tooltip" title="Contato recente" data-placement="right"><i
                            data-feather="phone-call"></i></span>
                </a>
                <a href="#tabFavorites" class="nav-link" data-toggle="tab">
                    <span data-toggle="tooltip" title="Favoritos" data-placement="right"><i
                            data-feather="star"></i></span>
                </a>
                <a href="#tabExport" class="nav-link" data-toggle="tab">
                    <span data-toggle="tooltip" title="Export Contacts" data-placement="right"><i
                            data-feather="upload"></i></span>
                </a>  --}}
            </nav>
        </div><!-- contact-navleft -->

        <div class="contact-sidebar">
            <div class="contact-sidebar-header">
                <i data-feather="search"></i>
                <div class="search-form">
                    <input type="search" class="form-control" placeholder="Pesquisar Contato">
                </div>
                <a href="#modalNewContact" class="btn btn-xs btn-icon btn-primary" data-toggle="modal">
                    <span data-toggle="tooltip" title="Adicionar contato"><i data-feather="user-plus"></i></span>
                </a><!-- contact-add -->
            </div><!-- contact-sidebar-header -->
            <div class="contact-sidebar-body">
                <div class="tab-content">
                    <div id="tabContact" class="tab-pane fade active show">
                        <div class="pd-y-20 pd-x-10 contact-list">
                            @php
                                $letra = "";    
                            @endphp
                            @foreach($clientes as $cliente)
                                @if($letra != strtoupper($cliente->nome[0]))
                                    @php
                                        $letra = strtoupper($cliente->nome[0]);
                                    @endphp
                                    <label id="contactA" class="contact-list-divider">{{$letra}}</label>
                                @endif
                                <div class="media">
                                    <input type="hidden" id="" name="" value="{{$cliente->nome}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->empresa}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->email}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->whatsapp}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->telefone}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->rua}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->numero}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->cidade}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->estado}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->id}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->facebook}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->linkedin}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->instagram}}">
                                    <input type="hidden" id="" name="" value="{{$cliente->notas}}">
                                    <div class="avatar avatar-sm avatar-online"><span
                                            class="avatar-initial rounded-circle bg-gray-700">{{ strtoupper($cliente->nome[0]) }}</span></div>
                                    <div class="media-body mg-l-10">
                                        <h6 class="tx-13 mg-b-3">{{$cliente->nome}}</h6>
                                        <span class="tx-12">{{$cliente->whatsapp}}</span>
                                    </div><!-- media-body -->
                                    <nav>
                                        {{--  <a href="#"><i data-feather="star"></i></a>  --}}
                                        <a href="#"><i data-feather="edit-2"></i></a>
                                    </nav>
                                </div><!-- media -->
                            @endforeach
                        </div><!-- contact-list -->
                    </div><!-- tab-pane -->
                    {{--  <div id="tabPhoneCall" class="tab-pane fade">
                        <div class="pd-y-20 pd-x-10 contact-list">
                            <label class="contact-list-divider">Recently Contacted</label>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><img src="../../assets/img/img13.jpg"
                                        class="rounded-circle" alt=""></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Camille Audrey</h6>
                                    <span class="tx-12">+1-234-567-890</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-offline"><span
                                        class="avatar-initial rounded-circle bg-success">E</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                                    <span class="tx-12">+63929-123-4567</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                        </div><!-- contact-list -->
                    </div><!-- tab-pane -->
                    <div id="tabFavorites" class="tab-pane fade">
                        <div class="pd-y-20 pd-x-10 contact-list">
                            <label class="contact-list-divider">My Favorites</label>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><img src="../../assets/img/img14.jpg"
                                        class="rounded-circle" alt=""></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Archie Cantones</h6>
                                    <span class="tx-12">archie@cantones.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><img src="../../assets/img/img11.jpg"
                                        class="rounded-circle" alt=""></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Brenda Aceron</h6>
                                    <span class="tx-12">brenda@aceron.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><span
                                        class="avatar-initial rounded-circle bg-indigo">B</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Brandibelle Yap</h6>
                                    <span class="tx-12">byap@urmail.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><img src="../../assets/img/img13.jpg"
                                        class="rounded-circle" alt=""></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Camille Audrey</h6>
                                    <span class="tx-12">+1-234-567-890</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-offline"><span
                                        class="avatar-initial rounded-circle bg-success">E</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                                    <span class="tx-12">+63929-123-4567</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                        </div><!-- contact-list -->
                    </div><!-- tab-pane -->
                    <div id="tabTags" class="tab-pane fade">
                        <div class="pd-y-20 pd-x-10 contact-list">
                            <label class="contact-list-divider">My Family</label>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><span
                                        class="avatar-initial rounded-circle bg-gray-700">A</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Abigail Johnson</h6>
                                    <span class="tx-12">+1-234-567-890</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><img src="../../assets/img/img14.jpg"
                                        class="rounded-circle" alt=""></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Archie Cantones</h6>
                                    <span class="tx-12">archie@cantones.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <label class="contact-list-divider">My Friends</label>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><span
                                        class="avatar-initial rounded-circle bg-primary">a</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Allan Rey Palban</h6>
                                    <span class="tx-12">allanr@palban.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-offline"><span
                                        class="avatar-initial rounded-circle bg-primary">D</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Daniel Calinawan</h6>
                                    <span class="tx-12">daniel@youremail.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <div class="media">
                                <div class="avatar avatar-sm avatar-offline"><span
                                        class="avatar-initial rounded-circle bg-success">E</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Elvis Vircede</h6>
                                    <span class="tx-12">+63929-123-4567</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                            <label class="contact-list-divider">My Officemates</label>
                            <div class="media">
                                <div class="avatar avatar-sm avatar-online"><span
                                        class="avatar-initial rounded-circle bg-gray-700">E</span></div>
                                <div class="media-body mg-l-10">
                                    <h6 class="tx-13 mg-b-3">Elena Salubre</h6>
                                    <span class="tx-12">e.salubre@myemail.com</span>
                                </div><!-- media-body -->
                                <nav>
                                    <a href="#"><i data-feather="star"></i></a>
                                    <a href="#"><i data-feather="edit-2"></i></a>
                                </nav>
                            </div><!-- media -->
                        </div><!-- contact-list -->
                    </div><!-- tab-pane -->
                    <div id="tabExport" class="tab-pane fade">
                        <div class="pd-y-25 pd-x-20">
                            <h6 class="tx-12 tx-semibold tx-spacing-1 tx-uppercase">Exportar Contatos</h6>
                            <p class="tx-13 tx-color-03 mg-b-20">Você pode exportar seus contatos e salvá-los em seu
                                computador.</p>
                            <div class="form-group">
                                <label class="tx-13">Quais contatos você quer exportar?</label>
                                <select class="custom-select tx-13">
                                    <option value="1" selected>Todos contatos</option>
                                    <option value="2">Apenas Favoritos</option>
                                </select>
                            </div><!-- form-group -->
                            <button class="btn btn-sm btn-primary">Exportar</button>
                        </div>
                    </div><!-- tab-pane -->  --}}
                </div><!-- tab-content -->
            </div><!-- contact-sidebar-body -->
        </div><!-- contact-sidebar -->

        <div class="contact-content">
            <div class="contact-content-header">
                <nav class="nav">
                    <a href="#contactInformation" class="nav-link active" data-toggle="tab">Informações do contato</a>
                </nav>
                <a href="#" id="contactOptions" class="text-secondary mg-l-auto d-xl-none"><i
                        data-feather="more-horizontal"></i></a>
            </div><!-- contact-content-header -->

            <div class="contact-content-body d-none" id="contact-body">
                <div class="tab-content">

                    <div id="contactInformation" class="tab-pane show active pd-20 pd-xl-25">
                        <div class="d-flex align-items-center justify-content-between mg-b-25">
                            <h6 class="mg-b-0">Detalhes Gerais do Contato</h6>
                            <div class="d-flex">
                                <a href="#modalEditContact" data-toggle="modal"
                                    class="btn btn-sm btn-white d-flex align-items-center mg-r-5"><i
                                        data-feather="edit-2"></i><span class="d-none d-sm-inline mg-l-5">
                                        Editar</span></a>
                                <a href="#modalDeleteContact" data-toggle="modal"
                                    class="btn btn-sm btn-white d-flex align-items-center"><i
                                        data-feather="trash"></i><span class="d-none d-sm-inline mg-l-5">
                                        Deletar</span></a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Nome</label>
                                <p class="mg-b-0" id="nome">Nome completo aqui</p>
                            </div><!-- col -->
                            <div class="col-6 col-sm">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Empresa</label>
                                <p class="mg-b-0" id="Empresa">Nome da Empresa</p>
                            </div><!-- col -->
                            <div class="col-sm mg-t-20 mg-sm-t-0">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10" >Cód.
                                    Contato</label>
                                <p class="mg-b-0" id="id">#0123456</p>
                            </div><!-- col -->
                        </div><!-- row -->

                        <h6 class="mg-t-40 mg-b-20">Informações para contato</h6>

                        <div class="row row-sm">
                            <div class="col-6 col-sm-4">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Whatsapp</label>
                                <p class="tx-primary tx-rubik mg-b-0" id="whatsapp">+55 35 9 9898 9898</p>
                            </div>
                            <div class="col-6 col-sm-4">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Telefone
                                    </label>
                                <p class="tx-primary tx-rubik mg-b-0">Não informado</p>
                            </div>
                            <div class="col-6 col-sm-4 mg-t-20 mg-sm-t-0">
                                {{--  <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Telefone
                                    2</label>
                                <p class="tx-primary tx-rubik mg-b-0">+55 35 9 9898 9898</p>  --}}
                            </div>
                            <div class="col-sm-4 mg-t-20 mg-sm-t-30">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Endereço
                                    de Email 1</label>
                                <p class="tx-primary mg-b-0" id="email">exemplo@exemplo.com.br</p>
                            </div>
                            
                            <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Endereço</label>
                                <p class="mg-b-0" id="endereco">4658 Kenwood Place<br>Pompano Beach, FL 33060, United States</p>
                            </div>
                            <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Link
                                    do Site</label>
                                <p class="tx-primary mg-b-0">http://pluzup.com.br</p>
                            </div>
                            <div class="col-sm-6 mg-t-20 mg-sm-t-30">
                                {{--  <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Midias
                                    Sociais</label>
                                <nav class="nav nav-social">
                                    <a href="#" class="nav-link"><i data-feather="facebook"></i></a>
                                    <a href="#" class="nav-link"><i data-feather="instagram"></i></a>
                                    <a href="#" class="nav-link"><i data-feather="linkedin"></i></a>
                                </nav>  --}}
                            </div><!-- col -->
                            <div class="col-sm mg-t-20 mg-sm-t-30">
                                <label
                                    class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Notas
                                    sobre o cliente</label>
                                <p class="tx-13 mg-b-0" id="notas"></p>
                            </div>
                        </div><!-- row -->
                    </div>

                </div><!-- tab-content -->
            </div><!-- contact-content-body -->

            <div class="contact-content-sidebar">
                <h5 id="contactName" class="tx-18 tx-xl-20 mg-b-5">Abigail Johnson</h5>
                <p class="tx-13 tx-lg-12 tx-xl-13 tx-color-03 mg-b-20">President &amp; CEO - ThemePixels, Inc.</p>
                <nav class="contact-call-nav mg-b-20">
                    <a href="#" class="nav-call" data-toggle="tooltip" title="Make a Phone Call"><i
                            data-feather="phone"></i></a>
                    <a href="#" class="nav-video" data-toggle="tooltip" title="Make a Video Call"><i
                            data-feather="video"></i></a>
                    <a href="#" class="nav-msg" data-toggle="tooltip" title="Send Message"><i
                            data-feather="message-square"></i></a>
                </nav><!-- contact-call-nav -->

                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-10">Biography</label>
                <p class="tx-13 mg-b-0">Gambler, Tea Drinker, Ultimate Piggie, Replacement President of a Major Soft
                    Drink Manufacturer. When I give out candies, I give people the flavour I dont like. </p>

                <hr class="mg-y-20">

                <label class="tx-10 tx-medium tx-spacing-1 tx-color-03 tx-uppercase tx-sans mg-b-15">Options</label>
                <nav class="nav flex-column contact-content-nav mg-b-25">
                    <a href="#" class="nav-link"><i data-feather="share"></i> Share this Contact</a>
                    <a href="#" class="nav-link"><i data-feather="star"></i> Add to Favorites</a>
                    <a href="#" class="nav-link"><i data-feather="slash"></i> Block this Contact</a>
                </nav>

            </div><!-- contact-content-sidebar -->
        </div><!-- contact-content -->

    </div><!-- contact-wrapper -->
</div>
</div><!-- content -->

<div class="modal fade effect-scale" id="modalNewContact" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-20">Adicionar novo contato</h5>
                <p class="tx-13 tx-color-03 mg-b-30">Informe os dados do novo contato.</p>

                <div class="d-sm-flex">
                    <div class="flex-fill">
                        <form action="{{route('painel.clientes.salvar')}}" method="post">
                            @csrf
                            <h6 class="mg-b-10">Informações pessoais</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="nome" placeholder="Nome">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="empresa" placeholder="Empresa (se tiver)">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Informações de contato</h6>

                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="email" class="form-control" name="telefone" placeholder="Telefone (Deixe em branco se for o mesmo do whatsapp)">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Endereço</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="estado" placeholder="Estado">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="rua" placeholder="Rua">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="numero" placeholder="Numero">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Redes Sociais</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="facebook" placeholder="Facebook">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="instagram" placeholder="Instagram">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="linkedin" placeholder="Linkedin">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Notas</h6>
                            <textarea class="form-control" rows="2" name="notas" placeholder="Insira aqui notas sobre o contato"></textarea>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div><!-- col -->
                </div>
            </div>
            <div class="modal-footer">
                <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
                    <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Discard</button>
                </div>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal fade effect-scale" id="modalEditContact" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body pd-20 pd-sm-30">
                <button type="button" class="close pos-absolute t-15 r-20" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h5 class="tx-18 tx-sm-20 mg-b-20">Editando contato</h5>

                <div class="d-sm-flex">
                    <div class="flex-fill">
                        <form id="formEdita" action="" method="post">
                            @csrf
                            <h6 class="mg-b-10">Informações pessoais</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="nome" id="edtNome" placeholder="Nome">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="empresa" id="edtEmpresa" placeholder="Empresa (se tiver)">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Informações de contato</h6>

                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="whatsapp" id="edtWhatsapp" placeholder="Whatsapp">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="email" class="form-control" name="telefone" id="edtTelefone" placeholder="Telefone (Deixe em branco se for o mesmo do whatsapp)">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="email" class="form-control" name="email" id="edtEmail" placeholder="Email">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Endereço</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="estado" id="edtEstado" placeholder="Estado">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="cidade" id="edtCidade" placeholder="Cidade">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="rua" id="edtRua" placeholder="Rua">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="numero" id="edtNumero" placeholder="Numero">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Redes Sociais</h6>
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="facebook" id="edtFacebook" placeholder="Facebook">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="instagram" id="edtInstagram" placeholder="Instagram">
                            </div><!-- form-group -->
                            <div class="form-group mg-b-10">
                                <input type="text" class="form-control" name="linkedin" id="edtLinkedin" placeholder="Linkedin">
                            </div><!-- form-group -->

                            <h6 class="mg-t-20 mg-b-10">Notas</h6>
                            <textarea class="form-control" rows="2" name="notas" id="edtNotas" placeholder="Insira aqui notas sobre o contato"></textarea>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Salvar</button>
                        </form>
                    </div><!-- col -->
                </div>
            </div>
            <div class="modal-footer">
                <div class="wd-100p d-flex flex-column flex-sm-row justify-content-end">
                    <button type="button" class="btn btn-secondary mg-sm-l-5" data-dismiss="modal">Cancelar</button>
                </div>
            </div><!-- modal-footer -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

<div class="modal fade effect-scale" id="modalDeleteContact" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Delete Contact</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mg-b-0">Deseja realmente deletar esse contato?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="" id="deletar" class="btn btn-primary">Deletar</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{asset('admin/js/dashforge.contacts.js')}}"></script>
<!-- append theme customizer -->
<script src="{{asset('admin/lib/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('admin/js/dashforge.settings.js')}}"></script>
@endsection