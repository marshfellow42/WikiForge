@extends('layouts.main')
@section('title', 'Criador')
@section('content')

    <div class="mt-3 row">
        <div class="col-md-3">
            <nav class="sidebar">
                <a href="/wiki/info"><x-bi-house-fill class="mb-1" /> Home</a>
                <a href="/wiki/creator"><x-bi-files class="mb-1" /> Páginas</a>
                <a href="/wiki/users"><x-bi-eye-fill class="mb-1" /> Usuários</a>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="text-white card bg-dark">
                <div class="card-header">Criador de Páginas</div>
                <div class="card-body">
                    <form action="/wiki/save" method="POST">
                        @csrf
                        <div class="mb-3 form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="text-white form-control bg-dark" required>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="content">Conteúdo</label>
                            <div id="editor"></div>
                            <textarea name="content" id="content" style="display:none;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js']) <!-- Ensure your script loads via Vite -->

@endsection
