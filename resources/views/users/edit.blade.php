<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <header>
        <h1>Editar Usuário</h1>
    </header>
    <main>
        <form action="{{ route('users.update', $user['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" value="{{ $user['name'] }}" required style="margin-bottom: 15px; display: block;">

            <label for="email">Email:</label>
            <input type="text" id="email" name="Email" value="{{ $user['email'] }}" required style="margin-bottom: 15px; display: block;">

            <button type="submit" style="padding: 10px 15px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">Salvar</button>
            <button onclick="location.href='{{ route('users.index') }}'" type="button" style="padding: 10px 15px; background-color: gray; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Voltar
            </button>
        </form>
    </main>
</body>
</html>
