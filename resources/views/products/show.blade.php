<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
</head>
<body>
    <header>
        <h1>Detalhes do Produto</h1>
    </header>
    <main>
        @if($products)
            <table>
                <tr>
                    <th style="padding: 10px; text-align: left;">ID:</th>
                    <td style="padding: 10px;">{{ $products->id }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Nome:</th>
                    <td style="padding: 10px;">{{ $products->name }}</td>
                </tr>
                <tr>
                    <th style="padding: 10px; text-align: left;">Preço:</th>
                    <td style="padding: 10px;">R$ {{ number_format($products->price, 2, ',', '.') }}</td>
                </tr>
            </table>
        @else
            <p style="color: red;">Produto não encontrado.</p>
        @endif

        <a href="{{ route('products.index') }}" style="display: inline-block; padding: 10px 15px; background-color: gray; color: white; text-decoration: none; border-radius: 5px; cursor: pointer;">Voltar para a Lista</a>
    </main>
</body>
</html>
