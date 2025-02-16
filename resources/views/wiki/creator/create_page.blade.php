@extends('layouts.main')
@section('title', 'Criador de Wiki')
@section('content')

    <div class="mt-3 row">
        <div class="col-md-3">
            <nav class="sidebar">
                <a href="/wiki/creator"><x-bi-files class="mb-1" /> Páginas</a>
                @if (Auth::user()->role == 'admin')
                    <a href="/wiki/users"><x-bi-eye-fill class="mb-1" /> Usuários</a>
                    <a href="/wiki/info"><x-bi-info-circle-fill class="mb-1" /> Informações</a>
                @endif
            </nav>
        </div>

        <div class="col-md-9">
            <div class="mb-3 text-white card bg-dark">
                <div class="card-header">Criador de Páginas</div>
                <div class="card-body">
                    <form action="/wiki/save" method="POST">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="text-white form-control bg-dark" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="title">Subtítulo</label>
                            <input type="text" name="subtitle" class="text-white form-control bg-dark">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="content">Conteúdo</label>
                            <div id="editor"></div>
                            <textarea name="content" id="content" style="display:none;"></textarea>
                        </div>
                        <div class="flex flex-col space-y-2">
                            <label for="image" class="font-semibold text-gray-600">Imagem</label>
                            <input type="file" name="main_image" class="mb-4 text-white form-control bg-dark">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js', 'resources/js/toastui.js'])

@endsection
