<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Livros</title>
</head>
<body>
    <header>
        <h1>Lista de Livros</h1>
    </header>
    <main>
        @if(session('success'))
            <div style="color: green; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td style="padding: 10px;">{{ $book['id'] }}</td>
                    <td style="padding: 10px;">{{ $book['title'] }}</td>
                    <td style="padding: 10px;">{{ $book['author'] }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('books.show', $book['id']) }}" style="padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">Ver</a>
                        <a href="{{ route('books.edit', $book['id']) }}" style="padding: 10px; background-color: orange; color: white; text-decoration: none; border-radius: 5px;">Editar</a>
                        <form action="{{ route('books.destroy', $book['id']) }}"  method="POST" style="display:inline; ">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 10px; background-color: red; color: white; text-decoration: none; border-radius: 5px;">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('books.create') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Adicionar Novo Livro</a>
        <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 10px 15px; background-color: gray; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar ao menu</a>
    </main>
</body>
</html>
