<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Livro</title>
</head>
<body>
    <header>
        <h1>Adicionar Novo Livro</h1>
    </header>
    <main>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required style="margin-bottom: 15px; display: block;">
            
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" required style="margin-bottom: 15px; display: block;">
    
            <label for="published_date">Data de Publicação:</label>
            <input type="date" id="published_date" name="published_date" style="margin-bottom: 15px; display: block;">
    
            <label for="pages">Páginas:</label>
            <input type="number" id="pages" name="pages" min="1" style="margin-bottom: 15px; display: block;">
    
            <label for="genre">Gênero:</label>
            <input type="text" id="genre" name="genre" style="margin-bottom: 15px; display: block;">
    
            <button type="submit" style="display: inline-block; padding: 10px 15px; background-color: blue; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; margin-top: 20px">Salvar Livro</button>
        </form>
        <a href="{{ route('books.index') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; margin-top: 20px">Voltar a lista</a>
    </main>
    <footer>
        <p>Todos os direitos reservados © 2025</p>
    </footer>
</body>
</html>