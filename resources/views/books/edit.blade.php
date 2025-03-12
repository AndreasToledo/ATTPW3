<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro</title>
</head>
<body>
    <header>
        <h1>Editar Livro</h1>
    </header>
    <main>
        <form action="{{ route('books.update', $book['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ $book['title'] }}" required style="margin-bottom: 15px; display: block;">

            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" value="{{ $book['author'] }}" required style="margin-bottom: 15px; display: block;">

            <label for="published_date">Data de Publicação:</label>
            <input type="date" id="published_date" name="published_date" value="{{ $book['published_date'] }}" style="margin-bottom: 15px; display: block;">

            <label for="pages">Páginas:</label>
            <input type="number" id="pages" name="pages" value="{{ $book['pages'] }}" min="1" style="margin-bottom: 15px; display: block;">

            <label for="genre">Gênero:</label>
            <input type="text" id="genre" name="genre" value="{{ $book['genre'] }}" style="margin-bottom: 15px; display: block;">

            <button type="submit" style="padding: 10px 15px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">Salvar</button>
            <button onclick="location.href='{{ route('books.index') }}'" type="button" style="padding: 10px 15px; background-color: gray; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Voltar
            </button>
        </form>
    </main>
</body>
</html>
