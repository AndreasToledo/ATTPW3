<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Usuário</title>
</head>
<body>
    <header>
        <h1>Confirmar Exclusão</h1>
    </header>
    <main>
        <p>Tem certeza de que deseja excluir o usuário <strong>{{ $user['name'] }}</strong>?</p>
        <form action="{{ route('users.destroy', $user['id']) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Sim, excluir</button>
        </form>
        <a href="{{ route('users.index') }}">Cancelar</a>
    </main>
</body>
</html>
