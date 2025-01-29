<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Epic Events</title>

    <link rel="shortcut icon" type="imagex/png" href="img/icones/imgEnderecoNavegador.ico">

    <!-- Link de arquivos CSS -->

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/maps.css') }}">
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Link de arquivos JS -->

    <script type="module" src="{{ asset('js/maps.js') }}"></script>
    <script type="module" src="{{ asset('js/menu.js') }}"></script>

    <!-- Fontes -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>

<body>
    <header>
        <nav class="cabecalho_container">
            <div class="cabecalho-logo">
                <img src="{{ asset('img/icones/logo.svg') }}" alt="icone do logo da empresa">
                <div class="logo-nome">
                    <p>Epic</p>
                    <p>Events</p>
                </div>
            </div>
            <div class="cabecalho_container-links"> 
                <ul class="cabecalho_links-lista" id="menu-links">
                    <li class="link-lista-item">
                        <a href="{{ route('events.index') }}" class="link_item">Inicio</a>
                    </li>
                    @auth
                    <li class="link-lista-item">
                        <a href="{{ route('events.create') }}" class="link_item criarEvento">Criar Eventos</a>
                    </li>
                    <li class="link-lista-item">
                        <a href="{{ route('dashboard') }}" class="link_item">Menu</a>
                    </li>
                    <li class="link-lista-item">
                        <a href="{{ route('profile.edit') }}" class="link_item">Perfil</a>
                    </li>
                    <li class="link-lista-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" class="link_item">
                                Sair
                            </a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="link-lista-item">
                        <a href="{{ route('login') }}" class="link_item criarEvento">Criar Eventos</a>
                    </li>
                    <li class="link-lista-item">
                        <a href="{{ route('login') }}" class="link_item login">Login</a>
                    </li>
                    <li class="link-lista-item">
                        <a href="{{ route('register') }}" class="link_item cadastrar">Cadastre-se</a>
                    </li>
                    @endguest
                </ul>
            </div>
            <i class="fa-solid fa-bars fa-2xl menu-hamburguer" id="menu-btn"></i>
        </nav>
    </header>

    @yield('content')

</body>

</html>