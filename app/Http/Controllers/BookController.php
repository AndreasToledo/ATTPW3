<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController
{
    public function index()
    {
        return view('books.index');
    }
    
    public function create()
    {
        return view('books.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_date' => 'nullable|date',
            'pages' => 'nullable|integer|min:1', 
            'genre' => 'nullable|string|max:100',
        ], [
            'title.required' => 'O título do livro é obrigatório!',
            'title.max' => 'O título não pode ter mais que 255 caracteres.',
            'author.required' => 'O nome do autor é obrigatório!',
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->published_date = $request->input('published_date');
        $book->pages = $request->input('pages');
        $book->genre = $request->input('genre');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro registrado com sucesso!');
    }
    
    public function show(string $id)
    {   
        $book=Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
    
    public function edit(string $id)
    {
        $book=Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    
    public function update(Request $request, string $id)
    {
        $book=Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();
        return redirect()->route('books.index')->with('success', 'Informações sobre o livro foram atualizadas com sucesso!');
    }    
    
    public function destroy($id)
    {
        $book=Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Livro retirado com sucesso!');
    }
}
