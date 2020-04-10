<div id="panel-cart">
    <div class="panel-cart-container">
        <div class="panel-cart-title">
            <h5 class="title">Seu carrinho</h5>
            <button class="close" data-toggle="panel-cart"><i class="ti ti-close"></i></button>
        </div>
        <div class="panel-cart-content">
            <table class="table-cart">
                <thead colspan="2">
                    <th>Produtos</th>
                </thead>
                @foreach(session()->get("carrinho")->produtos as $prod)
                    @php
                        $produto = \App\Produto::find($prod->produto)   
                    @endphp
                    <tr>
                        <td class="title">
                            <span class="name">{{$produto->nome}}</span>
                            <span class="caption text-muted">{{$produto->tamanhos->where("id",$prod->tamanho)->first()->nome}} - {{$produto->sabores->where("id",$prod->sabor)->first()->nome}}</span>
                        </td>
                        <td class="price">R${{number_format($prod->total,2,",",".")}}</td>
                        <td class="actions">
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table-cart">
                <thead colspan="2">
                    <th>Bolos</th>
                </thead>
                @foreach(session()->get("carrinho")->bolos as $bolo)
                    <tr>
                        <td class="title">
                            <span class="name">Bolo {{\App\Categoria::find($bolo->categoria)->nome}}</span>
                            {{-- <span class="caption text-muted"></span> --}}
                        </td>
                        <td class="price">R${{number_format($bolo->total,2,",",".")}}</td>
                        <td class="actions">
                            <a href="#" class="action-icon"><i class="ti ti-close"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="cart-summary">

                {{-- <div class="row">
                    <div class="col-7 text-right text-muted">Delivery:</div>
                    <div class="col-5"><strong>R$3.99</strong></div>
                </div> --}}
                <div class="row text-lg">
                    <div class="col-7 text-right text-muted">Total:</div>
                    <div class="col-5"><strong>R${{number_format(session()->get("carrinho")->total, 2, ",",".")}}</strong></div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{route('carrinho.checkout')}}" class="panel-cart-action btn btn-secondary btn-block btn-lg"><span>Fazer checkout</span></a>
</div>