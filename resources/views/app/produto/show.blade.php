@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Visualizar - Produto</p>
        </div>

        <div class='menu'>
            <ul>
                 <li><a href='{{ route('produto.index')}}'>Voltar</a></li>
                <li><a href=''>Consulta</a></li>
            </ul>
        </div>

        <div class='informação-pagina'>
            <div style='width: 50%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
               <table border="1">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $produto->id }}</td>
                    </tr>
                    <tr>
                        <td>NOME:</td>
                        <td>{{ $produto->nome }}</td>
                    </tr>
                    <tr>
                        <td>DESCRIÇÃO:</td>
                        <td>{{ $produto->descricao }}</td>
                    </tr>
                    <tr>
                        <td>PESO:</td>
                        <td>{{ $produto->peso }} Kg</td>
                    </tr>
                    <tr>
                        <td>UNIDADE:</td>
                        <td>{{ $produto->unidade_id }}</td>
                    </tr>
               </table>
            </div>
        </div>

    </div>
   
@endsection