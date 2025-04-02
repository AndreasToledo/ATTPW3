<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
</head>
<body>
    <header>
        <h1>Lista de Usuários</h1>
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td style="padding: 10px;">{{ $user->id }}</td>
                    <td style="padding: 10px;">{{ $user->name }}</td>
                    <td style="padding: 10px;">{{ $user->email }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('users.show', $user['id']) }}" style="padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">Ver</a>
                        <a href="{{ route('users.edit', $user['id']) }}" style="padding: 10px; background-color: orange; color: white; text-decoration: none; border-radius: 5px;">Editar</a>
                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 10px; background-color: red; color: white; border: none; border-radius: 5px;">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('users.create') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Adicionar Novo Usuário</a>
        <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 10px 15px; background-color: gray; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar ao menu</a>
    </main>
</body>
</html>
