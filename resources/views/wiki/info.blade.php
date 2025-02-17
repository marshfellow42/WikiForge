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
@section('title', 'Páginas')
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
            <!-- Cards Grid (Users, Pages, and any new ones) -->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">  <!-- Each card takes half width (2 per row) -->
                        <div class="mb-4 text-center card">
                            <a href="/wiki/users" style="text-decoration: none" class="text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Número de usuários</h5>
                                    <span class="target fs-1" data-count="{{ count($users) }}"></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-4 text-center card">
                            <a href="/wiki/creator" style="text-decoration: none" class="text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Número de páginas</h5>
                                    <span class="target fs-1" data-count="{{ count($pages) }}"></span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <?php
                    /*
                    <div class="col-md-6">
                        <div class="mb-4 text-center card">
                            <a href="/wiki/creator" style="text-decoration: none" class="text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Número de páginas</h5>
                                    <span class="target fs-1" data-count="{{ count($pages) }}"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    */
                    ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-4 card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="text-center text-white card-title">Especificações do Sistema</h5>

                        <!-- Detalhes do Host -->
                        <ul>
                            <li><strong>Cidade do Host:</strong> <?php echo $larinfo['host']['city']; ?></li>
                            <li><strong>País do Host:</strong> <?php echo $larinfo['host']['country']; ?></li>
                            <li><strong>IP do Host:</strong> <?php echo $larinfo['host']['ip']; ?></li>
                            <li><strong>Região do Host:</strong> <?php echo $larinfo['host']['region']; ?></li>
                            <li><strong>Fuso Horário do Host:</strong> <?php echo $larinfo['host']['timezone']; ?></li>
                        </ul>

                        <!-- Detalhes do Cliente -->
                        <ul>
                            <li><strong>Cidade do Cliente:</strong> <?php echo $larinfo['client']['city']; ?></li>
                            <li><strong>País do Cliente:</strong> <?php echo $larinfo['client']['country']; ?></li>
                            <li><strong>IP do Cliente:</strong> <?php echo $larinfo['client']['ip']; ?></li>
                            <li><strong>Região do Cliente:</strong> <?php echo $larinfo['client']['region']; ?></li>
                        </ul>

                        <!-- Detalhes do Servidor -->
                        <ul>
                            <li><strong>Sistema Operacional do Servidor:</strong> <?php echo $larinfo['server']['software']['os']; ?></li>
                            <li><strong>Distribuição do Servidor:</strong> <?php echo $larinfo['server']['software']['distro']; ?></li>
                            <li><strong>Kernel do Servidor:</strong> <?php echo $larinfo['server']['software']['kernel']; ?></li>
                            <li><strong>Servidor Web:</strong> <?php echo $larinfo['server']['software']['webserver']; ?></li>
                            <li><strong>Versão do PHP no Servidor:</strong> <?php echo $larinfo['server']['software']['php']; ?></li>
                            <li><strong>Versão do Laravel no Servidor:</strong> {{ app()->version() }}</li>
                        </ul>

                        <!-- Detalhes de Hardware do Servidor -->
                        <ul>
                            <li><strong>CPU do Servidor:</strong> <?php echo $larinfo['server']['hardware']['cpu']; ?></li>
                            <li><strong>Memória RAM Total do Servidor:</strong> <?php echo $larinfo['server']['hardware']['ram']['human_total']; ?></li>
                            <li><strong>Memória RAM Livre do Servidor:</strong> <?php echo $larinfo['server']['hardware']['ram']['human_free']; ?></li>
                            <li><strong>Disco Total do Servidor:</strong> <?php echo $larinfo['server']['hardware']['disk']['human_total']; ?></li>
                            <li><strong>Disco Livre do Servidor:</strong> <?php echo $larinfo['server']['hardware']['disk']['human_free']; ?></li>
                        </ul>

                        <!-- Tempo de Atividade do Servidor -->
                        <ul>
                            <li><strong>Tempo de Atividade do Servidor:</strong>
                                <?php
                                    echo str_replace(
                                        ['hours', 'minutes', 'seconds'],
                                        ['horas', 'minutos', 'segundos'],
                                        $larinfo['server']['uptime']['uptime']
                                    );
                                ?>
                            </li>
                            <li><strong>Servidor Inicializado Em:</strong> <?php echo $larinfo['server']['uptime']['booted_at']; ?></li>
                        </ul>

                        <!-- Detalhes do Banco de Dados -->
                        <ul>
                            <li><strong>Driver do Banco de Dados:</strong> <?php echo $larinfo['database']['driver']; ?></li>
                            <li><strong>Versão do Banco de Dados:</strong> <?php echo $larinfo['database']['version']; ?></li>
                        </ul>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @vite('resources/js/countup.js')

@endsection
