<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <header>
        <h1>Lista de Produtos</h1>
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
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td style="padding: 10px;">{{ $product['id'] }}</td>
                    <td style="padding: 10px;">{{ $product['name'] }}</td>
                    <td style="padding: 10px;">R$ {{ number_format($product['price'], 2, ',', '.') }}</td>
                    <td style="padding: 10px;">
                        <a href="{{ route('products.show', $product['id']) }}" style="padding: 10px; background-color: blue; color: white; text-decoration: none; border-radius: 5px;">Ver</a>
                        <a href="{{ route('products.edit', $product['id']) }}" style="padding: 10px; background-color: orange; color: white; text-decoration: none; border-radius: 5px;">Editar</a>
                        <form action="{{ route('products.destroy', $product['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 10px; background-color: red; color: white; border: none; border-radius: 5px;">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('products.create') }}" style="display: inline-block; padding: 10px 15px; background-color: green; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Adicionar Novo Produto</a>
        <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 10px 15px; background-color: gray; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar ao menu</a>
    </main>
</body>
</html>
