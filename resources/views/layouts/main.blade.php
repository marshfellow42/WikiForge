<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

@php

    $data = session('user_data');

@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- - CSS do Google - --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- - CSS do Bootstrap - --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.1/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/colreorder/2.0.4/css/colReorder.bootstrap5.min.css">
    {{-- -CSS do Projeto- --}}
    <link rel="stylesheet" href="/css/style.css">

</head>

<body class="d-flex flex-column min-vh-100">


    {{-- -


Aqui na navbar, na parte de Ver Perfil, aqui o processo vai pegar o nickname do usuario logado,
e em seguida irá redirecionar pra pagina de perfil daquela pessoa


- --}}

    <header>
        <nav class="navbar navbar-expand-lg bg-dark border-bottom border-body">
            <div class="container">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" height="30px"
                    width="30px">
                <a class="navbar-brand ps-2" href="/">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
                    <span class="pt-5 navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="mb-2 navbar-nav me-auto mb-lg-0">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/wiki/creator">Veja Wikis</a>
                            </li>
                        @endauth
                        {{--
                        @guest
                            <li class="nav-item">
                                <a tabindex="0" class="nav-link" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Faça o Login para acessar esse conteúdo">Crie sua Wiki</a>
                            </li>
                            <li class="nav-item">
                                <a tabindex="0" class="nav-link" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-content="Faça o Login para acessar esse conteúdo">Veja Wikis</a>
                            </li>
                        @endguest
                        --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Sobre Nós</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="jogos.html">Jogos</a>
                    </li> -->
                    </ul>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link">
                                <div class="bg-white d-flex align-items-center justify-content-center rounded-circle"
                                    style="width: 30px; height: 30px; overflow: hidden;">
                                    <x-bi-person-fill class="text-dark" />
                                </div>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <x-bi-caret-down-fill />
                            </a>
                            @auth
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            @endauth
                            @guest
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/login">Entrar</a></li>
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li><a class="dropdown-item" href="/register">Criar Conta</a></li>
                                </ul>
                            @endguest
                        </li>
                    </ul>
                    <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form> -->
                </div>
            </div>
        </nav>
    </header>

    @if (session('msg-warning'))
        <p class="msg-warning"> {{ session('msg-warning') }} </p>
    @endif
    @if (session('msg-success'))
        <p class="msg-success"> {{ session('msg-success') }} </p>
    @endif
    @if (session('msg-danger'))
        <p class="msg-danger"> {{ session('msg-danger') }} </p>
    @endif

    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>

    <footer class="mt-auto text-center">
        <p>
            &copy; 2024 - <?php echo date('Y'); ?> {{ config('app.name', 'Laravel') }}. Todos os direitos reservados.
        </p>
    </footer>

    {{-- -JS do Bootstrap- --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/dataTables.colReorder.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/2.0.4/js/colReorder.bootstrap5.min.js"></script>

    <script type="text/javascript">
        new DataTable('#myTable', {
            responsive: true,
            layout: {
                topStart: {
                    buttons: ['excel', 'pdf', 'colvis']
                }
            },
            stateSave: true,
            language: {
                url:"https://cdn.datatables.net/plug-ins/2.2.1/i18n/pt-BR.json"
            }
        });
    </script>

    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        const popover = new bootstrap.Popover('.popover-dismiss', {
            trigger: 'focus'
        })
    </script>
</body>

</html>
