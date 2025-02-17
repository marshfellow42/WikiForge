{{-- -[

parte do site pra fazer a parte de criação de uma wiki


coisas importantes para notar:
teremos topicos de uma wiki, e o usuario pode escolher quantos topicos ele quiser criar;
cada topico redirecionará para uma parte especifica da wiki.
e o usuario escolhera o nome do topico que aparecera na url, sem poder repetir nomes.

exemplo: Wiki - GTA SA
topico 1 - Sobre o CJ - nome url: cj
topico 2 - sobre a lore do jogo - nome url: jogo

dentro do topico 1 por exemplo, vao ter posts sobre o CJ e coisas relacionadas.
o usuario entrou dentro do post 1 por exemplo para mais informaçoes, e o post 1 é sobre Porque o cj abandonou a gangue?

estrutura do site de wiki's:

/wiki/{nome da wiki}/{topico 1}/{post 1}

/wiki/gtasa/cj/post1


- --}}

@extends('layouts.dashboard')
@section('title', 'Criador')
@section('content')

    <div class="mt-3 col-md-3">
        <nav class="sidebar">
            <a href="/wiki/creator"><x-bi-files class="mb-1" /> Páginas</a>
            @if (Auth::user()->role == 'admin')
                <a href="/wiki/users"><x-bi-eye-fill class="mb-1" /> Usuários</a>
                <a href="/wiki/info"><x-bi-info-circle-fill class="mb-1" /> Informações</a>
            @endif
        </nav>
    </div>

    <div class="mt-3 col-md-9">
        <div class="row">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Páginas</h1>
                <div class="d-flex">
                    <a href="/wiki/create_page" class="btn btn-primary" style="text-decoration: none">Criar uma Wiki</a>
                </div>
            </div>
        </div>

        <table class="table table-striped nowrap" style="width:100%" id="myTable">
            <thead>
                <th> id </th>
                <th> Título </th>
                <th> Link </th>
                {{-- <th> Markdown </th> --}}
                <th> Ações </th>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td><a href="/{{ $page->slug }}">{{ $page->slug }}</a></td>
                        {{-- <td>{{ $page->markdown }}</td> --}}
                        <td>
                            <form action="{{ route('pages.edit_page', $page->id) }}" method="GET" style="display: inline;">
                                <button class="btn btn-sm btn-warning" title="Editar">
                                    <x-bi-pencil-fill />
                                </button>
                            </form>

                            <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta página?');">
                                    <x-bi-trash-fill />
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>

            <tfoot>
                <th> id </th>
                <th> Título </th>
                <th> Link </th>
                {{-- <th> Markdown </th> --}}
                <th> Ações </th>
            </tfoot>

        </table>
    </div>


@endsection
