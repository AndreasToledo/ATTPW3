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
        <p><strong>ID:</strong> {{ $books->id }}</p>
        <p><strong>Título:</strong> {{ $books->title }}</p>
        <p><strong>Autor:</strong> {{ $books->author }}</p>
        <p><strong>Data de Publicação:</strong> {{ $books->published_date }}</p>
        <p><strong>Páginas:</strong> {{ $books->pages }}</p>
        <p><strong>Gênero:</strong> {{ $books->genre }}</p>
        <a href="{{ route('books.index') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar para a lista</a>
        <a href="{{ route('books.edit', $books->id) }}" style="display: inline-block; padding: 10px 15px; background-color: orange; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Editar</a>
    </main>
</body>
</html>
