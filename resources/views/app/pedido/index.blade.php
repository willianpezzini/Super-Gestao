@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Lista de Pedidos</p>
        </div>
    <br>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('pedido.create')}}'>Novo</a></li>
                <li><a href=''>Consulta</a></li>
            </ul>
        </div>
    <br>
    <br>
    <br>
        <div class='informação-pagina'>
            <div style='width: 80%; padding: 20px ; margin-left: auto; margin-right: auto;'>
                <table border="1" width='100%' margin="1">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>ID Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ( $pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id}}</td>
                                <td>{{ $pedido->cliente_id}}</td>
                                <td><a href="{{ route('pedido_produto.create', ['pedido' => $pedido->id]) }}">Adicionar Produtos</a></td>
                               
                                <td><a href="{{ route('pedido.show', ['pedido' => $pedido->id])}}" class='visualizar'>Visualizar</a></td>
                                <td>
                                    <form id="form_{{$pedido->id}}" method="POST" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf

                                        {{-- <button type="submit">Excluir</button>  --}}
                                        <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()" class='excluir'>Excluir</a>
                                    </form>    
                                </td>
                                <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id])}}" class='editar'>Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $pedidos->appends($request)->links()}}    
                <br>
                Exibindo {{ $pedidos->count()}} pedidos de {{ $pedidos->total() }} ( de{{ $pedidos->firstItem()}}
                a {{ $pedidos->lastItem()}})            
            </div>
        </div>

    </div>
   
@endsection
