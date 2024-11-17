@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
           <p>Adicionar - Produto</p>                
        </div>

        <div class='menu'>
            <ul>
                 <li><a href='{{ route('produto.index')}}'>Voltar</a></li>
                <li><a href=''>Consulta</a></li>
            </ul>
        </div>

        <div class='informação-pagina'>
            <div style='width: 50%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
               @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
               @endcomponent
            </div>
        </div>

    </div>
   
@endsection