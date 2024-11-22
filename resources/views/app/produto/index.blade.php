@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Lista de Produtos</p>
        </div>
    <br>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('produto.create')}}'>Novo</a></li>
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
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site Fornecedor</th>
                            <th>Estado</th>
                            <th>Peso (Kg)</th>
                            <th>Unidade ID</th>
                            <th>Comprimento (cm)</th>
                            <th>Altura (cm)</th>
                            <th>Largura (cm)</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome}}</td>
                                <td>{{ $produto->descricao}}</td>
                                <td>{{ $produto->fornecedor->nome}}</td>
                                <td>{{ $produto->fornecedor->site}}</td>
                                <td>{{ $produto->fornecedor->uf}}</td>
                                <td>{{ $produto->peso}}</td>
                                <td>{{ $produto->unidade_id}}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id])}}" class='visualizar'>Visualizar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" method="POST" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf

                                        {{-- <button type="submit">Excluir</button>  --}}
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()" class='excluir'>Excluir</a>
                                    </form>    
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id])}}" class='editar'>Editar</a></td>
                            </tr>
                 
                            <tr>
                                <td colspan='12'>
                                <br>    
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{route('pedido_produto.create', ['pedido' => $pedido->id] )}}">
                                            Pedido: {{ $pedido->id}} / 
                                            <br>
                                        </a>                                         
                                    @endforeach
                                <br>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $produtos->appends($request)->links()}}    
                <br>
                Exibindo {{ $produtos->count()}} produtos de {{ $produtos->total() }} ( de{{ $produtos->firstItem()}}
                a {{ $produtos->lastItem()}})            
            </div>
        </div>

    </div>
   
@endsection