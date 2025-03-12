<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        return view('products.index');
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'O nome do produto é obrigatório.',
            'name.max' => 'O nome do produto não pode ter mais que 255 caracteres.',
        ]);

        $product=new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto registrado com sucesso!');
    }
    
    public function show(string $id)
    {   
        $product=Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
    
    public function edit(string $id)
    {
        $product=Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product=Product::findOrFail($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produto removido com sucesso!');
    }
}
