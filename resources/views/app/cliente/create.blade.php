@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class='conteudo-pagina'>
        <div class='titulo-pagina-2'>
           <p>Adicionar - Cliente</p>                
        </div>

        <div class='menu'>
            <ul>
                 <li><a href='{{ route('cliente.index')}}'>Voltar</a></li>
                <li><a href=''>Consulta</a></li>
            </ul>
        </div>

        <div class='informação-pagina'>
            <div style='width: 50%; padding: 20px 0px; margin-left: auto; margin-right: auto;'>
               @component('app.cliente._components.form_create_edit')
               @endcomponent
            </div>
        </div>

    </div>
   
@endsection