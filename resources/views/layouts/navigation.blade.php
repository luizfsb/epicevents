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
            <img src="{{ asset('img/icones/icone-menu.svg') }}" alt="icone do menu hamburguer" class="menu-hamburguer" id="menu-btn">
        </nav>
    </header>