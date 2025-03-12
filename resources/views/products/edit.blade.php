<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <header>
        <h1>Editar Produto</h1>
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

        <form action="{{ route('products.update', $product['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label for="name">Nome do Produto:</label><br>
                <input type="text" id="name" name="name" value="{{ $product['name'] }}" required style="width: 100%; padding: 10px; margin-top: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="price">Preço (R$):</label><br>
                <input type="number" id="price" name="price" step="0.01" value="{{ $product['price'] }}" required style="width: 100%; padding: 10px; margin-top: 5px;">
            </div>

            <button type="submit" style="padding: 10px 15px; background-color: green; color: white; border: none; border-radius: 5px; cursor: pointer; margin-right: 10px;">Salvar Alterações</button>
            <button onclick="location.href='{{ route('products.index') }}'" type="button" style="padding: 10px 15px; background-color: gray; color: white; border: none; border-radius: 5px; cursor: pointer;">
                Voltar para Lista
            </button>
        </form>
    </main>
</body>
</html>