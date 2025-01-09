<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('login');
    }
    public function makelogin(Request $request)
    {

        // Validação dos dados do formulário
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Busca o usuário pelo email
        $requested = User::where('email', $request->email)->first();

        // Verifica se o usuário existe e se a senha está correta
        if ($requested && Hash::check($request->password, $requested->password)) {

            $data = [
                'id' => $requested->id,
                'name' => $requested->name,
                'email' => $requested->email,
                'nickname' => $requested->nickname,
            ];

            session(['user_data' => $data]);

            return redirect('/')
                ->with('msg-success', 'Olá, ' . $requested['nickname'] . '! Seja bem-vindo(a).');
        } else {
            // Redireciona de volta ao login com mensagem de erro
            return redirect('/login')
                ->with('msg-danger', 'Usuário ou senha incorretos!');
        }
    }
    public function register()
    {
        return view('register');
    }

    public function logout()
    {
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/')
            ->with('msg-success', 'Usuário deslogado com sucesso!');
    }

    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate(
            [
                'name' => 'required|string|max:255',
                'nickname' => 'required|unique:users,nickname',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
            ],
            [
                'name.required' => 'O campo nome é obrigatório.',
                'email.required' => 'Por favor, insira um e-mail.',
                'nickname.required' => 'Por favor, insira um nickname',
                'nickname.unique' => 'O nickname informado já está em uso, por favor escolha outro.',
                'email.email' => 'O e-mail deve ser válido.',
                'password.required' => 'A senha é obrigatória.',
                'password.min' => 'A senha deve ter pelo menos :min caracteres.',
                'password.confirmed' => 'As senhas não coincidem.',
            ]
        );

        $user = new User;
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];
        $user->nickname = $validated['nickname'];

        $user->save();

        $data = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'nickname' => $user->nickname,
        ];

        session(['user_data' => $data]);

        return redirect('/')->with('msg-success', 'Usuário Criado com Sucesso!');
    }
}
