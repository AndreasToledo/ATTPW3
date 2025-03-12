<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController
{
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'name' => 'Notebook',
                'price' => 3500.00,
            ],
            [
                'id' => 2,
                'name' => 'Smartphone',
                'price' => 1200.00,
            ],
            [
                'id' => 3,
                'name' => 'Monitor 4K',
                'price' => 900.00,
            ],
        ];

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required' => 'O nome do produto é obrigatório!',
            'price.required' => 'O preço do produto é obrigatório!',
            'price.numeric' => 'O preço deve ser um número válido!',
            'price.min' => 'O preço deve ser maior ou igual a zero!',
        ]);

        // $product = new Product();
        // $product->name = $request->input('name');
        // $product->price = $request->input('price');
        // $product->save();

        return redirect()->route('products.index')->with('success', 'Produto registrado com sucesso!');
    }

    public function show($id)
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Notebook',
                'price' => 3500.00,
            ],
            2 => [
                'id' => 2,
                'name' => 'Smartphone',
                'price' => 1200.00,
            ],
            3 => [
                'id' => 3,
                'name' => 'Monitor 4K',
                'price' => 900.00,
            ],
        ];

        if (!isset($products[$id])) {
            abort(404, 'Produto não encontrado.');
        }

        $product = $products[$id];
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Notebook',
                'price' => 3500.00,
            ],
            2 => [
                'id' => 2,
                'name' => 'Smartphone',
                'price' => 1200.00,
            ],
            3 => [
                'id' => 3,
                'name' => 'Monitor 4K',
                'price' => 900.00,
            ],
        ];

        if (!isset($products[$id])) {
            abort(404, 'Produto não encontrado.');
        }

        $product = $products[$id];
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ], [
            'name.required' => 'O nome do produto é obrigatório!',
            'price.required' => 'O preço do produto é obrigatório!',
            'price.numeric' => 'O preço deve ser um número válido!',
            'price.min' => 'O preço deve ser maior ou igual a zero!',
        ]);

        // $product = Product::findOrFail($id);
        // $product->name = $request->input('name');
        // $product->price = $request->input('price');
        // $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $products = [
            1 => [
                'id' => 1,
                'name' => 'Notebook',
                'price' => 3500.00,
            ],
            2 => [
                'id' => 2,
                'name' => 'Smartphone',
                'price' => 1200.00,
            ],
            3 => [
                'id' => 3,
                'name' => 'Monitor 4K',
                'price' => 900.00,
            ],
        ];

        if (!isset($products[$id])) {
            return redirect()->route('products.index')->with('error', 'Produto não encontrado!');
        }

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
