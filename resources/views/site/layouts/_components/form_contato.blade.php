{{ $slot }}



<form action= {{ route('site.contato')}} method="post">
    @csrf
    <input name='nome' value="{{old('nome')}}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if ($errors->first('nome'))
        {{ $errors->first('nome')}}
    @endif
    <br>
    <input name='telefone' value="{{old('telefone')}}" type="text" placeholder="(00)12345-6789" class="{{ $classe }}">
     @if ($errors->first('telefone'))
        {{ $errors->first('telefone')}}
    @endif
    <br>
    <input name='email' value="{{old('email')}}" type="text" placeholder="exemplo@exemplo.com.br" class="{{ $classe }}">
     @if ($errors->first('email'))
        {{ $errors->first('email')}}
    @endif
    <br>
    <select name='motivo_contato' class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
     @if ($errors->first('motivo_contato'))
        {{ $errors->first('motivo_contato')}}
    @endif
    <br>
    <textarea name='mensagem' class="{{ $classe }}"> @if(old('mensagem')!= ''){{ old('mensagem')}} @else Preencha aqui a sua mensagem @endif </textarea>
     @if ($errors->first('mensagem'))
        {{ $errors->first('mensagem')}}
    @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach
    </div>  

@endif
    