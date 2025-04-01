<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Livro</title>
</head>
<body>
    <header>
        <h1>Detalhes do Livro</h1>
    </header>
    <main>
        <p><strong>ID:</strong> {{ $book->id }}</p>
        <p><strong>Título:</strong> {{ $book->title }}</p>
        <p><strong>Autor:</strong> {{ $book->author }}</p>
        <p><strong>Data de Publicação:</strong> {{ $book->published_date }}</p>
        <p><strong>Páginas:</strong> {{ $book->pages }}</p>
        <p><strong>Gênero:</strong> {{ $book->genre }}</p>
        <a href="{{ route('books.index') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar para a lista</a>
        <a href="{{ route('books.edit', $book['id']) }}" style="display: inline-block; padding: 10px 15px; background-color: orange; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Editar</a>
    </main>
</body>
</html>
