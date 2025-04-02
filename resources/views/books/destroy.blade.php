<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Livro</title>
</head>
<body>
    <header>
        <h1>Confirmar Exclusão</h1>
    </header>
    <main>
        <p>Tem certeza de que deseja excluir o livro <strong>{{ $book->title }}</strong>?</p>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Sim, excluir</button>
        </form>
        <a href="{{ route('books.index') }}">Cancelar</a>
    </main>
</body>
</html>
