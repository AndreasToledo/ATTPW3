<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir produto</title>
</head>
<body>
    <header>
        <h1>Confirmar Exclusão</h1>
    </header>
    <main>
        <p>Tem certeza de que deseja excluir o produto <strong>{{ $products->name }}</strong>?</p>
        <form action="{{ route('products.destroy', $products->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Sim, excluir</button>
        </form>
        <a href="{{ route('products.index') }}">Cancelar</a>
    </main>
</body>
</html>
