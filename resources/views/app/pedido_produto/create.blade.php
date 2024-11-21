@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Adicionar - Produtos ao Pedido</p>
        </div>

        <div class='menu'>
            <ul>
                <li><a href='{{ route('pedido.index') }}'>Voltar</a></li>
                <li><a href=''>Consulta</a></li>
            </ul>
        </div>

        <div class='informação-pagina'>

            <h4>Detalhes do Pedido</h4>
            <h5>ID do Pedido: {{ $pedido->id }}</h5>
            <h5>ID do Cliente: {{ $pedido->cliente_id }}</h5>

            <div style='width: 50%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID produto</th>
                            <th>Nome produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $pedido->produtos as $produto) 
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                            </tr>
                            
                        @endforeach
                        
                    </tbody>
                </table>
                @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                @endcomponent
            </div>
        </div>

    </div>

@endsection
