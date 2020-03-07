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
                <h4 class="mg-b-0">Calculadora de Custos</h4>

            </div><!-- filemgr-content-header -->
            <div class="filemgr-content-body">
                <div class="pd-20 pd-lg-25 pd-xl-30">

                    <label class="d-block tx-medium tx-10 tx-uppercase tx-sans tx-spacing-1 tx-color-03 mg-b-15">Insira
                        os dados e calcule</label>
                    <div class="row row-xs">

                        <div class="col-12 col-sm-12 col-md-12 col-xl">
                            <div class="card card-file">

                                <div class="card-body mg-b-20">
                                    <div class="d-md-flex align-items-center justify-content-between">
                                        <div class="media align-sm-items-center">
                                            <div class="tx-40 tx-lg-60 lh-0 tx-orange"></div>
                                            <div class="media-body">
                                                <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                                    Valor de Venda da Receita</h6>
                                                <div class="d-flex align-items-baseline mg-t-10">
                                                    R$ <input type="text" class="form-control ml-1" id="valorVenda" value="0.00">
                                                </div>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="media align-sm-items-center">
                                            <div class="tx-40 tx-lg-60 lh-0 tx-orange"></div>
                                            <div class="media-body">
                                                <h6 class="tx-12 tx-lg-14 tx-semibold tx-uppercase tx-spacing-1 mg-b-5">
                                                    Custo Total Unitário</h6>
                                                <div class="d-flex align-items-baseline">
                                                    <h2
                                                        class="tx-20 tx-lg-28 tx-normal tx-rubik tx-spacing--2 lh-2 mg-b-0" id="custoTotal">
                                                        R$0.00</h2>
                                                    <h6 class="tx-11 tx-lg-16 tx-normal tx-rubik tx-success mg-l-5 lh-2 mg-b-0"
                                                        data-toggle="tooltip"
                                                        title="% Lucro em relação ao Valor de Venda da Receita" id="lucroTotal"><i
                                                            class="icon ion-md-arrow-up"></i></h6>
                                                </div>
                                            </div><!-- media-body -->
                                        </div><!-- media -->

                                        <div class="d-flex flex-column flex-sm-row mg-t-20 mg-md-t-0">
                                            <button class="btn btn-sm btn-white btn-uppercase pd-x-15"><i
                                                    data-feather="download" class="mg-r-5"></i> Exportar Custo</button>
                                            <button class="btn btn-sm btn-primary btn-uppercase pd-x-15 mg-l-10"> Como
                                                Funciona</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <table id="tab-controle-pedidos" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ingrediente</th>
                                                <th scope="col">Preço Prod.</th>
                                                <th scope="col">Quant. Total</th>
                                                <th scope="col">Quant. Usada</th>
                                                <th scope="col">Custo</th>
                                                <th scope="col">Uso %</th>
                                                <th scope="col">Excluir</th>
                                            </tr>
                                        </thead>
                                        <tbody id="body-table">

                                        </tbody>
                                    </table>

                                </div>

                                <div class="card-body">
                                    <h6><a class="link-02 mg-b-10">Insira os ingredientes</a></h6>
                                    <div class="input-group">
                                        <input type="text" aria-label="Produto" id="nome" class="form-control"
                                            placeholder="Ingrediente">
                                        <input type="text" aria-label="Preço" id="preco" class="form-control"
                                            placeholder="Preço Produto">
                                        <input type="text" aria-label="Quantidade Total" id="qtdTotal" class="form-control"
                                            placeholder="Quantidade da Embalagem">
                                        <input type="text" aria-label="Quantidade Usada" id="qtdUsada" class="form-control"
                                            placeholder="Quantidade Usada">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button"
                                                id="addItem" onClick="addItem()">Adicionar</button>
                                        </div>
                                    </div>
                                </div>



                                <div class="card-footer mg-t-20"></div>
                            </div>
                        </div><!-- col -->

                    </div><!-- row -->

                </div>
            </div><!-- filemgr-content-body -->
        </div><!-- filemgr-content -->

    </div><!-- filemgr-wrapper -->
</div>
</div><!-- content -->
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

    var html = "";
    var pos = 0;
    var ingredientes = {
        "nome" : [],
        "preco" : [],
        "qtdTotal" : [],
        "qtdUsada" : [],
        "custo" : [],
        "uso" : []
    };
    var custoTotal = 0;

    $("#valorVenda").change(function(){
        valorVenda = (parseFloat($("#valorVenda").val())).toFixed(2);
        if(valorVenda == 0){
            lucro = -100;
        }else{
            lucro = 100 - (custoTotal*100/valorVenda);
        }
        $("#body-table").html(html);
        if(lucro > 0)
            $("#lucroTotal").html('<i class="icon ion-md-arrow-up" style="color:green;"></i>' + lucro + "%");
        else
            $("#lucroTotal").html('<i class="icon ion-md-arrow-down" style="color: red;"></i>' + lucro + "%");
        $("#custoTotal").html("R$" + custoTotal.toFixed(2));
    });

    function addItem(){
        ingredientes.nome[pos] = $("#nome").val();
        ingredientes.preco[pos] = parseFloat($("#preco").val()).toFixed(2);
        ingredientes.qtdTotal[pos] = parseInt($("#qtdTotal").val()).toFixed(2);
        ingredientes.qtdUsada[pos] = parseInt($("#qtdUsada").val()).toFixed(2);
        ingredientes.custo[pos] = (ingredientes.preco[pos] * ingredientes.qtdUsada[pos] / ingredientes.qtdTotal[pos]);
        ingredientes.uso[pos] = (ingredientes.qtdUsada[pos] * 100 / ingredientes.qtdTotal[pos]);
        html += "<tr>";
        html +=     '<th scope="row">'+ingredientes.nome[pos]+'</th>';
        html +=     '<td> R$' + ingredientes.preco[pos].toFixed(2) + '</td>';
        html +=     '<td>' + ingredientes.qtdTotal[pos] + '</td>';
        html +=     '<td>' + ingredientes.qtdUsada[pos] + '</td>';
        html +=     '<td> R$' + ingredientes.custo[pos].toFixed(2) + '</td>';
        html +=     '<td>' + ingredientes.uso[pos].toFixed(2) + '% </td>';
        html +=     '<td>';
        html +=         '<nav class="nav d-none d-sm-flex mg-r-auto">';
        html +=             '<div class="flex-fill"><a href="/painel/pedidos/prod-pedidos-detalhes.php"';
        html +=                     'class="btn btn-xs btn-block btn-danger">';
        html +=                         '<i data-feather="trash"></i></a></div>';
        html +=         '</nav>';
        html +=     '</td>';
        html += '</tr>';
        custoTotal += ingredientes.custo[pos];
        valorVenda = parseFloat($("#valorVenda").val());
        if(valorVenda == 0){
            lucro = -100;
        }else{
            lucro = 100 - (custoTotal*100/valorVenda);
        }
        $("#body-table").html(html);
        if(lucro > 0)
            $("#lucroTotal").html('<i class="icon ion-md-arrow-up" style="color:green;"></i><span style="color:green;">' + lucro.toFixed(2) + "% </span>");
        else
            $("#lucroTotal").html('<i class="icon ion-md-arrow-down" style="color: red;"></i><span style="color: red;">' + lucro .toFixed(2)+ "% </span>");
        $("#custoTotal").html("R$" + custoTotal.toFixed(2));
        pos++;

    }

    $(function(){
        'use strict'
        
        $('#tab-controle-pedidos').DataTable({
            paging: false,
            searching: false,
            info: false,  
            language: {
                searchPlaceholder: 'Pesquisar...',
                sSearch: '',
                lengthMenu: '_MENU_ itens/pagina',
                sZeroRecords: "Nenhum registro encontrado",
            }
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>

  <script>
    'use strict'

    $(document).ready(function(){
        if(window.matchMedia('(min-width: 1200px)').matches) {
            $('.aside').addClass('minimize');
        }
    })
  </script>
@endsection