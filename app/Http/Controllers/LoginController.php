<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        if ($request->get('erro') == 1) {
            $erro = 'Usuario e senha não existentes.';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Você precisa realizar o login para ter acesso a página.';
        }


        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagem de feedback de validação
        $feedback = [
            'usuario.email' => 'o campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        //recupera os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';

        //inicia o Model User
        $user = new User();

        $usuario =  $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
            
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair(Request $request) {
        $request->session()->flush();
        return redirect()->route('site.principal');
    }
}
