<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Funcao para mostrar os eventos criados na pagina principal
     */
    public function index(Request $request)
    {

        $events = Event::when(request('pesquisar'), function ($query) {
            $query->where('titulo', 'like', '%' . request('pesquisar') . '%');
        })->get();

        return view('events.index', [
            'events' => $events,
            'pesquisar' => request('pesquisar'),
        ]);
    }

    /**
     * Funcao para criar a view de criacao de eventos
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Funcao para a criacao do evento
     */
    public function store(EventRequest $request, User $user)
    {
        $user = auth()->user();

        // if($request->hasFile('imagem_nome'))
        // {
        //     $fileResquest = $request->imagem_nome;
        //     $nomeImagem = rand(0,999999) . "-" . $request->file('imagem_nome')->getClientOriginalName();;
        //     $fileResquest->move(public_path('img/eventosImagens'), $nomeImagem);
        // }
        $data = $request->all();

        if($request->hasFile('imagem_nome'))
        {
            $fileResquest = $request->imagem_nome;
            $nomeImagem = rand(0,99999999) . "-" . $fileResquest->getClientOriginalName();
            $fileResquest->storeAs('img/eventosImagens', $nomeImagem);
            $data['imagem_nome'] = $nomeImagem;
        }

        $data['user_id'] = $user->id;


        $user->eventos()->create($data);

        return redirect()->route('events.index');
    }

    /**
     * Funcao para mostra o evento selecionado
     */
    public function show($eventId)
    {
        $event = Event::find($eventId);

        $participando = false;

        if ($user = auth()->user()) {
            foreach ($user->eventosParticipantes as $userEvento) {
                if ($userEvento->id == $eventId) {
                    $participando = true;
                }
            }
        }

        return view('event', compact('event', 'participando'));
    }

    /**
     * Funcao para mostra os eventos criados pelo usuario e os que ele esta participando no dashboard
     */

    public function dashboard(User $user)
    {

        $user = auth()->user();

        $events = Event::where('user_id', $user->id)->get();

        $eventosParticipantes = $user->eventosParticipantes;

        return view('dashboard', compact('events', 'eventosParticipantes'));
    }

    /**
     * Funcao para participar dos eventos criados
     */

    public function participarDoEvento($eventId)
    {

        $user = auth()->user();

        $user->eventosParticipantes()->attach($eventId);

        return redirect()->route('dashboard');
    }

    /**
     * Funcao para sair dos eventos criados
     */

    public function sairDoEvento($eventId)
    {
        $user = auth()->user();

        $user->eventosParticipantes()->detach($eventId);

        return redirect()->route('dashboard');
    }

    /**
     * Funcao para criar a view de edicao dos eventos criados
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Funcao para de atualizacao do formulario de edicao do evento
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->all();
        if($request->hasFile('imagem_nome'))
        {
            $fileResquest = $request->imagem_nome;
            $nomeImagem = rand(0,99999999) . "-" . $fileResquest->getClientOriginalName();
            $fileResquest->storeAs('img/eventosImagens', $nomeImagem);
            $data['imagem_nome'] = $nomeImagem;
        }

        $event->update($data);

        return redirect()->route('dashboard');
    }

    /**
     * Funcao para remover o evento criado
     */
    public function destroy(Event $event, User $user)
    {
        $event->delete();

        return redirect()->route('dashboard');
    }
}
