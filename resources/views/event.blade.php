@extends('layouts.main')

@section('content')
<div class="evento">
    <div class="evento_conteudo">
        <img class="evento_imagem" src="/img/eventosImagens/{{$event->imagem}}" alt="Imagem do evento">
        <div class="evento_dados">
            <p class="evento_titulo">{{ $event->titulo }}</p>
            <div class="evento_info">
                <div class="evento_participantes">
                    <img src="{{ asset('img/icones/iconeParticipantes.svg') }}" alt="Icone do calendario">
                    <a href="" class="evento_participantes"></a>
                    <p class="evento_participantes">{{ count($event->users) }} participantes</p>
                </div>
            </div>
            <div class="evento_info">
                <div class="evento_data">
                    <img src="{{ asset('img/icones/iconeData.svg') }}" alt="Icone do calendario">
                    <p class="evento_data">{{ date('d/m/Y', strtotime($event->data)) }} | {{ date('H:i', strtotime($event->horario)) }}</p>
                </div>
            </div>
            <div class="evento_info">
                <div class="evento_endereco">
                    <img src="{{ asset('img/icones/iconeLocalizacao.svg') }}" alt="Icone localizacao">
                    <div class="endereco">
                        <p>{{ $event->rua . " - " . $event->bairro . ", " . $event->cidade . "-" . $event->estado . " | " .  $event->cep }}</p>
                        <p>Complemento: {{ $event->complemento }}</p>
                    </div>
                </div>
            </div>
            @auth
            @if($participando)
            <p class="paragrafo-participando">Você já está participando!</p>
            @else
            <form action="{{ route('event.participar', $event)}}" method="POST">
                @csrf
                <button type="submit" class="btn-presenca">
                    Confirmar presença
                </button>
            </form>
            @endif
            @endauth
            @guest
            <p>Você  precisa estar logado para participar do evento! <a href="{{ route('login') }}" class="link-nao-logado">Clique aqui e realize o login</a></p>
            @endguest
        </div>
    </div>
    <div class="evento_descricao">
        <p class="descricao_titulo">Sobre o Evento</p>
        <p class="descricao_texto">{{ $event->descricao }}</p>
    </div>
</div>
@endsection