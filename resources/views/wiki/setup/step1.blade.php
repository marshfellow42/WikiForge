<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Criação Inicial - Passo 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
</head>

<body class="text-white bg-dark">

    <div class="container mt-5">
        <h1>Bem Vindo à sua Wiki!</h1>
        <form action="{{ route('setup.handleStep1') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="wikiName" class="form-label">Nome da sua Wiki</label>
                <input type="text" class="form-control" id="wikiName" name="wikiName" value="{{ old('wikiName') }}"
                    required>
                @error('wikiName')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Próximo</button>
        </form>
    </div>

</body>

</html>
