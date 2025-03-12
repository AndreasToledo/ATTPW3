<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao.silva@example.com',
            ],
            [
                'id' => 2,
                'name' => 'Maria Oliveira',
                'email' => 'maria.oliveira@example.com',
            ],
            [
                'id' => 3,
                'name' => 'Carlos Santos',
                'email' => 'carlos.santos@example.com',
            ],
        ];

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
        ], [
            'name.required' => 'O nome do usuário é obrigatório!',
            'email.required' => 'O email do usuário é obrigatório!',
            'email.email' => 'Informe um email válido!',
            'email.unique' => 'Este email já está em uso!',
        ]);

        // $user = new User();
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário registrado com sucesso!');
    }

    public function show($id)
    {
        $users = [
            1 => [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao.silva@example.com',
            ],
            2 => [
                'id' => 2,
                'name' => 'Maria Oliveira',
                'email' => 'maria.oliveira@example.com',
            ],
            3 => [
                'id' => 3,
                'name' => 'Carlos Santos',
                'email' => 'carlos.santos@example.com',
            ],
        ];

        if (!isset($users[$id])) {
            abort(404, 'Usuário não encontrado.');
        }

        $user = $users[$id];
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $users = [
            1 => [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao.silva@example.com',
            ],
            2 => [
                'id' => 2,
                'name' => 'Maria Oliveira',
                'email' => 'maria.oliveira@example.com',
            ],
            3 => [
                'id' => 3,
                'name' => 'Carlos Santos',
                'email' => 'carlos.santos@example.com',
            ],
        ];

        if (!isset($users[$id])) {
            abort(404, 'Usuário não encontrado.');
        }

        $user = $users[$id];
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // $user = User::findOrFail($id);
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->save();

        return redirect()->route('users.index')->with('success', 'Dados de usuário foram atualizadas com sucesso!');
    }

    public function destroy($id)
    {
        $users = [
            1 => [
                'id' => 1,
                'name' => 'João Silva',
                'email' => 'joao.silva@gmail.com',
            ],
            2 => [
                'id' => 2,
                'name' => 'Maria Oliveira',
                'email' => 'maria.oliveira@gmail.com',
            ],
            3 => [
                'id' => 3,
                'name' => 'Carlos Santos',
                'email' => 'carlos.santos@gmail.com',
            ],
        ];

        if (!isset($users[$id])) {
            return redirect()->route('users.index')->with('error', 'Usuário não encontrado!');
        }

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}