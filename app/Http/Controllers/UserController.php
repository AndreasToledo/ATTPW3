<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        return view('users.index');
    }
    
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user=new User();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuário cadastrado com sucesso!');
    }
    
    public function show(string $id)
    {
        $user=User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    
    public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('users.edit', compact('user'));
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ], [
            'name.required' => 'O nome da pessoa é obrigatório.',
            'name.max' => 'O nome não pode ter mais que 255 caracteres.',
            'email.required' => 'O email do usuário é obrigatório.',
            'email.max' => 'O email do usuário é muito longo.'
        ]);

        $user=User::findOrFail($id);
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->save();
        return redirect()->route('users.index')->with('success', 'Dados de usuário com sucesso!');
    }
    
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
