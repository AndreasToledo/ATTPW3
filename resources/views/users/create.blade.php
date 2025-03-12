<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Novo Usuário</title>
</head>
<body>
    <header>
        <h1>Criar Novo Usuário</h1>
    </header>
    <main>
        @if ($errors->any())
            <div style="color: red; margin-bottom: 20px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name">Nome do Usuário:</label><br>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 10px; margin-top: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; margin-top: 5px;">
            </div>

            <button type="submit" style="padding: 10px 15px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">
                Salvar Usuário
            </button>
            <button onclick="location.href='{{ route('users.index') }}'" type="button" style="padding: 10px 15px; background-color: gray; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Voltar para Lista
            </button>
        </form>
    </main>
</body>
</html>