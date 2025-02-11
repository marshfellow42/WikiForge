<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Criação Inicial - Passo 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="text-white bg-dark">

    <div class="container mt-5">
        <h1>Defina a Senha do Administrador</h1>
        <form action="{{ route('setup.handleStep4', ['wiki_setup_id' => $wiki_setup_id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Finalizar</button>
        </form>

    </div>

</body>
</html>
