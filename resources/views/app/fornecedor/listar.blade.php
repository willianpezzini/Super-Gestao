@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Listar - Fornecedor</p>
        </div>
    <br>
        <div class='menu'>
            <ul>
                <li><a href='{{ route('app.fornecedor.adicionar') }}'>Novo</a></li>
                <li><a href='{{ route('app.fornecedor.listar') }}'>Consulta</a></li>
                <li><a href='{{ route('app.fornecedor') }}'>Voltar</a></li>
            </ul>
        </div>
    <br>
    <br>
    <br>
        <div class='informação-pagina'>
            <div style='width: 80%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
                <table border="1" width='100%'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome}}</td>
                                <td>{{ $fornecedor->site}}</td>
                                <td>{{ $fornecedor->uf}}</td>
                                <td>{{ $fornecedor->email}}</td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"> Excluir</a></td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}"> Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $fornecedores->appends($request)->links()}}                
            </div>
        </div>

    </div>
   
@endsection