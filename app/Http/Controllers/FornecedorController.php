<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;


class FornecedorController extends Controller
{

    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate();

       
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {

        // inclução
        $msg = '';
        if($request->input('_token') != '' && $request->input('id') == '') {
            // validação dos dados
            $regras = [
                'nome' => 'required|min:3|max:60',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',


            ];

            $feedback = [
                'requerid' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome pode ter no máximo 60 caracteres',
                'uf.min' => 'O campo UF precisa ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF pode ter no máximo 2 caracteres',
                'email.email' => 'O campo e-mail não foi preenchido corretamente'

            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = 'Cadastro realizado com sucesso!';
        }

        // edição
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Alteração realizada com sucesso!';
            }else {
                echo 'Erro, ocorreu algum problema!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' =>$msg]);

        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '') {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' =>$msg]);

    }

    public function excluir($id) {
        //Exclui da lista de consulta, mas NÃO exclui do banco de dados
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }


}
