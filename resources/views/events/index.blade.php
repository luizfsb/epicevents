@extends('layouts.main')

@section('content')

<!-- Apresentacao do site -->

<main>
    <section class="apresentacao">
        <h1 class="apresentacao_titulo">Epic Events</h1>
        <div class="paragrafo">
            <p class="apresentacao_paragrafo">Os melhores eventos</p>
        </div>
        <form action="{{ route('events.index') }}" method="get">
            <div class="apresentacao_pesquisar">
                <button type="submit" class="btn-pesquisar">
                    <img src="{{ asset('img/icones/search.svg') }}" alt="Imagem do icone de pesquisar">
                </button>
                <label for="pesquisar"></label>
                <input type="text" name="pesquisar" id="pesquisar" placeholder="Encontre um evento"
                    class="apresentacao_input">
            </div>
        </form>
    </section>
</main>

<!-- Eventos disponiveis e funcoes da barra de pesquisar -->

<section class="eventos">
    <div class="eventos-apresentacao_texto-buscando">
        @if($pesquisar)
        <h2 class="eventos-titulo-buscando">Buscando por: {{ $pesquisar }}</h2>
        @else
        <h2 class="eventos-titulo-buscando">Proximos eventos</h2>
        @endif

        @if(count($events) === 0 && $pesquisar)
        <p class="eventos-paragrafo-buscando">Não existem eventos com este nome! Para ver todos os eventos, <a
                href="{{ route('events.index') }}" class="evento-link-buscando">Clique aqui</a>
        </p>
        @endif
    </div>
    <div class="card_container">
        @foreach($events as $event)
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="/img/eventosImagens/{{ $event->imagem }}" alt="Imagem do evento" class="item_imagem">
                    <div class="card-apresentacao">
                        <p class="item_subtitulo">{{ $event->titulo }}</p>
                        <p class="data">{{ date('d-m-Y', strtotime($event->data)) }} | {{ date('H:i', strtotime($event->horario))}}</p>
                        <div class="localizacao-card">
                            <img class="localizacao-img" src="{{ asset('img/icones/iconePointLocalizacao.svg') }}"
                                alt="Icone localizacao">
                            <p class="nome-localizacao">
                                {{ $event->bairro . ", " . $event->cidade . "-" . $event->estado }}
                            </p>
                        </div>
                        <a href="{{ route('events.show', $event->id) }}" class="card_link-front">Saber mais</a>
                    </div>
                </div>
                <div class="flip-card-back">
                    <a href="{{ route('events.show', $event->id) }}" class="card_link-back">Saber mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Rodape da pagina -->

<footer class="rodape">
    <div class="rodape-conteudo">
        <div class="rodape-logo-redes">
            <a href="{{ route('events.index') }}" class="rodape-logo">
                <img class="rodape-logo_img" src="{{ asset('img/icones/logo.svg') }}" alt="icone do logo da empresa">
                <div class="logo-nome-rodape">
                    <p>Epic</p>
                    <p>Events</p>
                </div>
            </a>
            <div class="rodape-redes">
                <a href="https://www.instagram.com/" class="icone-link">
                    <img src="{{ asset('img/icones/iconeInstagram.svg') }}" alt="Icone do instagram">
                </a>
                <a href="https://x.com/" class="icone-link">
                    <img src="{{ asset('img/icones/iconeX.svg') }}" alt="Icone do X">
                </a>
            </div>
        </div>
    </div>
    <div class="rodape-conteudo">
    </div>
    <div class="rodape-conteudo">
        <div class="rodape_empresa">
            <p>Belo Horizonte-MG</p>
            <p>CNPJ: 00.000.000/0000-00</p>
        </div>
    </div>
    <div class="rodape-conteudo">
        <div class="contatos-telefone">
            <img src="{{ asset('img/icones/telefone.svg')}}" alt="">
            <p>0800 000 000</p>
        </div>
        <div class="contatos-email">
            <img src="{{ asset('img/icones/iconeEmail.svg')}}" alt="">
            <p>epicevents@epicevents.com.br</p>
        </div>
    </div>
    <div class="rodape-conteudo">
        <nav class="rodape_nav">
            <a href="{{ route('events.index') }}" class="rodape_link">Inicio</a>
            <a href="{{ route('login') }}" class="rodape_link">Criar Eventos</a>
        </nav>
    </div>
</footer>
@endsection