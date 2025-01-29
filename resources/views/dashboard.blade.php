@extends('layouts.main')

@section('content')

<section class="eventos-menu">

    <h1 class="titulo_eventos-menu">Eventos que estou participando</h1>
    <div class="eventos-participando">
        @if(count($eventosParticipantes) == 0)
        <div class="meus-eventos-nao-participando">
            <p>Voce nao esta participando de eventos no momento.</p>
            <p><a href="{{ route('events.index') }}">Clique aqui</a> e confira os eventos disponiveis.</p>
        </div>
        @else
        @foreach($eventosParticipantes as $event)
        <div class="meus-eventos-participando">
            <a href="{{ route('events.show', $event) }}" class="titulo-participante">{{ $event->titulo }}</a>
            <form action="{{ route('event.sair', $event) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn-sair-participante" type="submit" onclick="return confirm('Tem certeza que deseja nao participar do evento?')">Sair do Evento</button>
            </form>
        </div>
        @endforeach
        @endif
    </div>

    <h2 class="titulo_eventos-menu">Meus eventos criados</h2>
    <div class="eventos-criados">
        @if(count($events) == 0)
        <div class="meus-eventos-nao-participando">
            <p>Você não possui eventos criados.</p>
            <p>Para criar o seu propio evento, <a href="{{ route('events.create') }}">clique aqui</a> e preencha o formulario de criação.</p>
        </div>
        @else
        @foreach($events as $event)
        <div class="meus-eventos">
            <a href="{{ route('events.show', $event) }}" class="meus-eventos-titulo">{{ $event->titulo }}</a>
            <p>{{ count($event->users) }} Participantes</p>
            <div class="btn_meus-eventos">
                <a href="{{ route('events.edit', $event)}}" class="btn-editar">Editar</a>
                <form action="{{ route('events.destroy', $event) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-excluir" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </div>
        </div>
        @endforeach
        @endif
    </div>

</section>
@endsection