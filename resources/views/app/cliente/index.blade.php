@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Lista de Clientes</p>
        </div>
    <br>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('cliente.create')}}'>Novo</a></li>
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
                            <th></th>
                            <th></th>
                            <th></th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->nome}}</td>
                               
                                <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id])}}" class='visualizar'>Visualizar</a></td>
                                <td>
                                    <form id="form_{{$cliente->id}}" method="POST" action="{{ route('cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf

                                        {{-- <button type="submit">Excluir</button>  --}}
                                        <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" class='excluir'>Excluir</a>
                                    </form>    
                                </td>
                                <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id])}}" class='editar'>Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clientes->appends($request)->links()}}    
                <br>
                Exibindo {{ $clientes->count()}} clientes de {{ $clientes->total() }} ( de{{ $clientes->firstItem()}}
                a {{ $clientes->lastItem()}})            
            </div>
        </div>

    </div>
   
@endsection
