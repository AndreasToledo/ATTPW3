<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <body>
    <title>Dashboard</title>
    </head>
    <body>
    <h1>Bem-vindo ao CRUD</h1>
    <ul>
        <li><a href="{{ route('users.index') }}" style="display: inline-block; padding: 10px 15px; background-color: red; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; margin: 15px;">Gerenciar Usuários</a></li>
        <li><a href="{{ route('books.index') }}" style="display: inline-block; padding: 10px 15px; background-color: blue; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; margin: 15px;">Gerenciar Livros</a></li>
        <li><a href="{{ route('products.index') }}" style="display: inline-block; padding: 10px 15px; background-color: purple; color: white; text-decoration: none; border-radius: 5px; cursor: pointer; margin: 15px;">Gerenciar Produtos</a></li>
    
    </body>
</html>
