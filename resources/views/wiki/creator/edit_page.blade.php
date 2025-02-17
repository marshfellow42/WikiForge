@extends('layouts.main')
@section('title', 'Editor da página')
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
                <div class="card-header">Editor da Página</div>
                <div class="card-body">
                    <form action="{{ route('wiki.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" class="text-white form-control bg-dark" value="{{ $page->title }}" required>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="subtitle">Subtítulo</label>
                            <input type="text" name="subtitle" class="text-white form-control bg-dark" value="{{ $page->subtitle }}">
                        </div>

                        <div class="mb-3 form-group">
                            <label for="content">Conteúdo</label>
                            <div id="editor">
                                {{ $page->markdown }}
                            </div>
                            <textarea name="content" id="content" style="display:none;"></textarea>
                        </div>

                        <div class="flex flex-col space-y-2">
                            <label for="image" class="font-semibold text-gray-600">Imagem</label>
                            <input type="file" name="main_image" class="mb-4 text-white form-control bg-dark">

                            @if($page->image)
                                <img src="{{ asset('storage/' . $page->image) }}" alt="Imagem Atual" class="mt-2 w-32">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js', 'resources/js/toastui.js'])

@endsection
