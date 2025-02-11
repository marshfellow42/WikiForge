<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Criação Inicial - Passo 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="text-white bg-dark">

    <div class="container mt-5">
        <h1>Informe o E-mail do Administrador</h1>
        <form action="{{ route('setup.handleStep3', ['wiki_setup_id' => $wiki_setup_id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="adminEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="{{ old('adminEmail') }}" required>
                @error('adminEmail') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Próximo</button>
        </form>

    </div>

</body>
</html>
