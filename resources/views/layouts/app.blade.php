<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
</head>
<body>
    <header>
        <h1>Meu Sistema de Livros</h1>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
