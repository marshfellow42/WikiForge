<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{--- CSS do Google ---}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{--- CSS do Bootstrap ---}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{---CSS do Projeto---}}
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>


{{---
    
    
Aqui na navbar, na parte de Ver Perfil, aqui o processo vai pegar o nickname do usuario logado,
e em seguida irá redirecionar pra pagina de perfil daquela pessoa
    
    
---}}

    <header>
        <nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">WikiForge</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/wiki/creator">Crie sua Wiki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Veja Wikis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Sobre Nós</a>
                        </li>
                        <!-- <li class="nav-item">
                        <a class="nav-link" href="jogos.html">Jogos</a>
                    </li> -->
                    </ul>
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item">
                            <a class="nav-link">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary"
                                    style="width: 30px; height: 30px; overflow: hidden;">
                                    <img
                                        src="https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg"
                                        alt="Profile" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profile/Kelwinkxps13">Ver Conta</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li><a class="dropdown-item" href="/">Logout</a></li>
                            </ul>
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

    @yield('content')

    {{---JS do Bootstrap---}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <footer>
        <p style="text-align: center;">&copy; 2024 WikiForge. Todos os direitos reservados.</p>
    </footer>
</body>

</html>