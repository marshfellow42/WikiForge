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

@extends('layouts.main')
@section('title', 'Criador')
@section('content')

    <div class="mt-3 col-md-3">
        <nav class="sidebar">
            <a href="/wiki/info"><x-bi-house-fill class="mb-1" /> Home</a>
            <a href="/wiki/creator"><x-bi-files class="mb-1" /> Páginas</a>
            <a href="/wiki/users"><x-bi-eye-fill class="mb-1" /> Usuários</a>
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
                <th> Slug </th>
                <th> Markdown </th>
                <th> Ações </th>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->markdown }}</td>

                        <td>
                            <form action="editar_usuarios.php" method="post" style="display: inline;">
                                <input type="hidden" name="email" value="">
                                <button class="btn btn-sm btn-warning" title="Editar">
                                    <x-bi-pencil-fill />
                                </button>
                            </form>

                            <form action="php/funcao-admin-sistema-excluir-usuarios.php" method="post"
                                style="display: inline;">
                                <input type="hidden" name="email" value="">
                                <button class="btn btn-sm btn-danger" title="Excluir">
                                    <x-bi-trash-fill />
                                </button>
                            </form>

                            <button class="btn btn-sm btn-secondary" title="Visualizar" style="display: inline;">
                                <x-bi-eye-fill />
                            </button>
                        </td>

                    </tr>
                @endforeach

            </tbody>

            <tfoot>
                <th> id </th>
                <th> Título </th>
                <th> Slug </th>
                <th> Markdown </th>
                <th> Ações </th>
            </tfoot>

        </table>
    </div>


@endsection
