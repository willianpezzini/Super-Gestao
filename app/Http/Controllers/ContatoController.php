<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteContato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {

        // $contato = new SiteContato();

        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email= $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');

        // $contato->save();

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request) 
    {
        $request->validate (
            [
            'nome' => 'required|min:3|max:80|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required',

            ],
            [
                'nome.min:3' => 'O campo nome precisa ter pelo menos 3 letras.',
                'nome.min:80' => 'O campo nome pode ter no máximo 80 letras.',
                'nome.unique:site_contatos' => 'O nome informado já foi utilizado.',

                'required' => 'O campo :attribute precisa ser preenchido.',
                'email' => 'Formato de email inválido, utilize um formato válido.',
            ]
    );
        SiteContato::create($request->all());


        return view('site.contato');
    }
}