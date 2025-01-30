@extends('layouts.main')

@section('content')

<!-- Formulario de criação de eventos -->

<form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
    @csrf
    <div class="campos">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="formulario_nome-titulo">
            <h1 class="formulario_nome-titulo">Criar Eventos</h1>
            <img src="{{ asset('img/icones/iconeCriarEventos.svg') }}" alt="icone de criacao de eventos">
        </div>
        <div class="formulario_titulo">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" id="titulo" class="input_titulo" value="{{ old('titulo') }}">
        </div>
        <div class="formulario_imagem">
            <label for="imagem">Imagem</label>
            <p class="imagem-paragrafo">Selecione uma imagem para a capa do seu evento:</p>
            <input type="file" name="imagem" id="imagem" class="input_imagem" value="{{ old('imagem') }}">
        </div>
        <div class="formulario_data">
            <label for="data">Data</label>
            <input type="date" name="data" id="data" class="input_data" value="{{ old('data') }}">
        </div>
        <div class="formulario_horario">
            <label for="horario">Horario</label>
            <input type="time" name="horario" id="horario" class="input_horario" value="{{ old('horario') }}">
        </div>
        <div class="formulario_descricao">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="text_descricao" value="{{ old('descricao') }}"></textarea>
        </div>

        <!-- Mapa do google maps e os seus inputs para endereço -->

        <div class="form_maps">
            <gmpx-api-loader key="{{ env('GOOGLE_MAPS_KEY')}}"
                solution-channel="GMP_QB_addressselection_v3_cAB">
            </gmpx-api-loader>
            <gmpx-split-layout row-layout-min-width="600">
                <div class="panel" slot="main">
                    <div>
                        <span class="sb-title">Endereço</span>
                    </div>
                    <input class="half-input-top" name="rua" type="text" placeholder="Rua" id="location-input"
                        value="{{ old('rua') }}" />
                    <input class="half-input-top" type="text" name="bairro" placeholder="Bairro" value="{{ old('bairro') }}" />
                    <input class="half-input-top complemento" type="text" name="complemento" placeholder="Complemento (opcional)" value="{{ old('complemento') }}" />
                    <input type="text" placeholder="Cidade" id="locality-input" name="cidade" value="{{ old('cidade') }}" />
                    <div class="half-input-container">
                        <input type="text" class="half-input" name="estado" placeholder="Estado"
                            id="administrative_area_level_1-input" value="{{ old('estado') }}" maxlength="2" />
                        <input type="text" class="half-input" name="cep" placeholder="CEP" id="postal_code-input"
                            value="{{ old('cep') }}" maxlength="9" />
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