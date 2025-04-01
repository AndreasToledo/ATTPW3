<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
    $books = [
        [
            'id' => 1,
            'title' => 'O Senhor dos Anéis',
            'author' => 'J.R.R. Tolkien',
            'published_date' => '1954-07-29',
            'pages' => 1216,
            'genre' => 'Fantasia',
        ],
        [
            'id' => 2,
            'title' => '1984',
            'author' => 'George Orwell',
            'published_date' => '1949-06-08',
            'pages' => 328,
            'genre' => 'Distopia',
        ],
        [
            'id' => 3,
            'title' => 'Orgulho e Preconceito',
            'author' => 'Jane Austen',
            'published_date' => '1813-01-28',
            'pages' => 279,
            'genre' => 'Romance',
        ],
    ];

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

        //$book=new Book();
        //$book->title=$request->input('title');
        //$book->author=$request->input('author');
        //$book->published_date=$request->input('published_date');
        //$book->pages = $request->input('pages');
        //$book->genre = $request->input('genre');
        //book->save();

        return redirect()->route('books.index')->with('success', 'Livro registrado com sucesso!');
    }
    
    public function show($id)
    {
        $books = [
            1 => [
                'id' => 1,
                'title' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
                'published_date' => '1954-07-29',
                'pages' => 1216,
                'genre' => 'Fantasia',
            ],
            2 => [
                'id' => 2,
                'title' => '1984',
                'author' => 'George Orwell',
                'published_date' => '1949-06-08',
                'pages' => 328,
                'genre' => 'Distopia',
            ],
            3 => [
                'id' => 3,
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
                'published_date' => '1813-01-28',
                'pages' => 279,
                'genre' => 'Romance',
            ],
        ];

        if (!isset($books[$id])) {
            abort(404, 'Livro não encontrado.');
        }

        $book = $books[$id];
        return view('books.show', compact('book'));
    }

    public function edit($id)
    {
        $books = [
            1 => [
                'id' => 1,
                'title' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
                'published_date' => '1954-07-29',
                'pages' => 1216,
                'genre' => 'Fantasia',
            ],
            2 => [
                'id' => 2,
                'title' => '1984',
                'author' => 'George Orwell',
                'published_date' => '1949-06-08',
                'pages' => 328,
                'genre' => 'Distopia',
            ],
            3 => [
                'id' => 3,
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
                'published_date' => '1813-01-28',
                'pages' => 279,
                'genre' => 'Romance',
            ],
        ];
    
        if (!isset($books[$id])) {
            abort(404, 'Livro não encontrado.');
        }
    
        $book = $books[$id];
        return view('books.edit', compact('book'));
    }
       
    public function update(Request $request, string $id)
    {
        //$book=Book::findOrFail($id);
        //$book->title=$request->input('title');
        //$book->author=$request->input('author');
        //$book->save();
        return redirect()->route('books.index')->with('success', 'Informações sobre o livro foram atualizadas com sucesso!');
    }    
    
    public function destroy($id)
    {
        $books = [
            1 => [
                'id' => 1,
                'title' => 'O Senhor dos Anéis',
                'author' => 'J.R.R. Tolkien',
            ],
            2 => [
                'id' => 2,
                'title' => '1984',
                'author' => 'George Orwell',
            ],
            3 => [
                'id' => 3,
                'title' => 'Orgulho e Preconceito',
                'author' => 'Jane Austen',
            ],
        ];

    if (!isset($books[$id])) {
        return redirect()->route('books.index')->with('error', 'Livro não encontrado!');
    }

    return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }
}
