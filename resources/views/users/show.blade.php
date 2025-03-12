<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do usuário</title>
</head>
<body>
    <header>
        <h1>Detalhes do Usuário</h1>
    </header>
    <main>
        <p><strong>ID:</strong> {{ $user['id'] }}</p>
        <p><strong>Nome:</strong> {{ $user['name'] }}</p>
        <p><strong>Email:</strong> {{ $user['email'] }}</p>
        <a href="{{ route('users.index') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar para a lista</a>
        <a href="{{ route('users.edit', $user['id']) }}" style="display: inline-block; padding: 10px 15px; background-color: orange; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Editar</a>
    </main>
</body>
</html>
