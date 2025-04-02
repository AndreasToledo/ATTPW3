<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::All();
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

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto registrado com sucesso!');
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);

        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);

        return view('products.edit', compact('products'));
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
            'price.min' => 'O preço deve ser maior que zero.',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
