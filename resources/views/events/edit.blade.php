@extends('layouts.main')

@section('content')

<!-- Formulario de edição dos eventos criados -->

<form action="{{ route('events.update', $event->id) }}" method="POST" class="formulario" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="campos">
        <div class="formulario_nome-titulo">
            <h1 class="formulario_nome-titulo">Editar Evento</h1>
            <img src="{{ asset('img/icones/iconeCriarEventos.svg') }}" alt="icone de criacao de eventos">
        </div>
        <div class="formulario_titulo">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="input_titulo" value="{{ $event->titulo }}">
        </div>
        <div class="formulario_imagem">
            <label for="imagem">Imagem</label>
            <p class="imagem-paragrafo">Selecione uma imagem para a capa do seu evento:</p>
            <input type="file" name="imagem" id="imagem" class="input_imagem">
        </div>
        <img src="/img/eventosImagens/{{ $event->imagem }}" alt="Imagem do evento" class="imagem-preview">
        <div class="formulario_data">
            <label for="data">Data</label>
            <input type="date" name="data" id="data" class="input_data" value="{{ $event->data }}">
        </div>
        <div class="formulario_horario">
            <label for="horario">Horario</label>
            <input type="time" name="horario" id="horario" class="input_horario" value="{{ $event->horario }}">
        </div>
        <div class="formulario_descricao">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="text_descricao">{{ $event->descricao }}</textarea>
        </div>

        <!-- Mapa do google maps e os seus inputs para endereço -->

        <div class="form_maps">
            <gmpx-api-loader key="{{ env('GOOGLE_MAPS_KEY')}}" solution-channel="GMP_QB_addressselection_v3_cAB">
            </gmpx-api-loader>
            <gmpx-split-layout row-layout-min-width="600">
                <div class="panel" slot="main">
                    <div>
                        <span class="sb-title">Endereço</span>
                    </div>
                    <input class="half-input-top" name="rua" type="text" placeholder="Rua" id="location-input" value="{{ $event->rua }}" />
                    <input class="half-input-top" type="text" name="bairro" placeholder="Bairro" value="{{ $event->bairro }}" />
                    <input class="half-input-top complemento" type="text" name="complemento" placeholder="Complemento (opcional)" value="{{ $event->complemento }}" />
                    <input type="text" name="cidade" placeholder="Cidade" id="locality-input" value="{{ $event->cidade }}" />
                    <div class="half-input-container">
                        <input type="text" class="half-input" name="estado" placeholder="Estado" id="administrative_area_level_1-input" value="{{ $event->estado }}" />
                        <input type="text" class="half-input" name="cep" placeholder="CEP" id="postal_code-input" value="{{ $event->cep }}" />
                    </div>
                </div>
                <gmp-map slot="fixed">
                    <gmp-advanced-marker></gmp-advanced-marker>
                </gmp-map>
            </gmpx-split-layout>
        </div>
        <button type="submit" class="formulario_btn">Salvar</button>
    </div>
</form>

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