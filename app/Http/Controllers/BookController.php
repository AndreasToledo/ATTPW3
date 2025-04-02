<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::All();
        return view('books.index', compact('books'));
    }
    
    public function create()
    {
        return view('books.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:500',
            'author' => 'required|string|max:255',
            'published_date' => 'required|date',
            'pages' => 'required|integer|min:1', 
            'genre' => 'required|string|max:100',
        ], [
            'title.required' => 'O título do livro é obrigatório!',
            'title.max' => 'O título não pode ter mais que 500 caracteres.',
            'author.required' => 'O nome do autor é obrigatório.',
            'published_date.required' => 'A data de publicação é necessária.',
            'pages.required' => 'O número de páginas é necessário.',
            'genre.required' => 'O gênero da obra é necessário.'
        ]);

        $book=new Book();
        $book->title=$request->input('title');
        $book->author=$request->input('author');
        $book->published_date=$request->input('published_date');
        $book->pages = $request->input('pages');
        $book->genre = $request->input('genre');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro registrado com sucesso!');
    }
    
    public function show($id)
    {
        $books = Book::findOrFail($id);

        return view('books.show', compact('books'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:500',
            'author' => 'required|string|max:255',
        ]);

        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Informações sobre o livro foram atualizadas com sucesso!');
    }    
    
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }
}
