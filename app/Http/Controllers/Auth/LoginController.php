<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request) {
        $request->validate([
            'nick' => 'required',
            'senha' => 'required|min:6'
        ]);

        $plain = $request->only(['nick', 'senha', 'remember_me']);

        if ($user = Usuario::where('nick', $plain['nick'])->first()) {
            if (Hash::check($plain['senha'], $user->senha)) {
                session()->push('user', $user);

                return response()->json([
                    'success' => true,
                    'message' => 'Logado com sucesso, aguarde um instante...'
                ]);
            }

            return response()->json([
                'error' => 'INCORRECT_PASSWORD',
                'message' => 'Senha incorreta'
            ]);
        }

        return response()->json([
            'error' => 'USER_NOT_FOUND',
            'message' => 'Este usuário não existe'
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'nick'  => 'required|min:3',
            'senha' => 'required|min:6'
        ]);

        $data = $request->only('nick', 'senha');

        $consult = Usuario::where('nick', $request->only('nick'));

        if($consult->count() > 0) {
            return response()->json([
                'error'     => true,
                'message'   => 'Usuário já registrado!'
            ]);
        } else {
            Usuario::insert(['nick' => $request->nick, 'senha' => bcrypt($request->senha)]);
            return response()->json([
                'success' => true,
                'message' => 'Registrado com sucesso!'
            ]);
        }
    }

    public function logout() {
        session()->invalidate();
        session()->flush();

        return redirect()->back();
    }
}
