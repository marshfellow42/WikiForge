<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Criação Inicial - Passo 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="text-white bg-dark">

    <div class="container mt-5">
        <h1>Selecione a Linguagem Principal</h1>
        <form action="{{ route('setup.handleStep2', ['wiki_setup_id' => $wiki_setup_id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="language" class="form-label">Linguagem</label>
                <select id="language" name="language" class="form-select" required>
                    <option value="pt" {{ old('language') == 'pt' ? 'selected' : '' }}>Português</option>
                    <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="es" {{ old('language') == 'es' ? 'selected' : '' }}>Español</option>
                </select>
                @error('language') <div class="text-danger">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Próximo</button>
        </form>

    </div>

</body>
</html>
