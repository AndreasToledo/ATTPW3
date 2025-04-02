<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::All();
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

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário registrado com sucesso!');
    }

    public function show($id)
    {
        $users = User::findOrFail($id);

        return view('users.show', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Dados de usuário foram atualizadas com sucesso!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }
}