@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
            <p>Fornecedor</p>
        </div>

        <div class='menu'>
            <ul>
                <li><a href='{{ route('app.fornecedor.adicionar') }}'>Novo</a></li>
                <li><a href='{{ route('app.fornecedor.listar') }}'>Consulta</a></li>
                <li><a href='{{ route('app.fornecedor') }}'>Voltar</a></li>
            </ul>
        </div>
        <br>
        {{ $msg ?? ''}}
        <br>
        

        <div class='informação-pagina'>
            <div style='width: 50%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
                <form method="" action="{{ route('app.fornecedor.listar') }}">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                    <input type="text" name="site" placeholder="Site" class="borda-preta">
                    <input type="text" name="uf" placeholder="Sigla Estado" class="borda-preta">
                    <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                    <button type="submit" class="borda-preta">Pesquisar</button>
                </form>
            </div>
        </div>

    </div>
   
@endsection