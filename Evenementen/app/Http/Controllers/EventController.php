<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EventController extends Controller
{
    //



    public function index(){
        $event = Event::all();
        return view('events.index', compact('event'));
    }

    public function create(){
        return view('events.create');
    }

    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'maxpeople' => 'required',
            'price' => 'required',
        ]);
        auth()->user()->events()->create($data);
        return redirect('/event/');
    }

    public function show(\App\Event $event){
        $follows = (auth()->user()) ? auth()->user()->following->contains($event): false;
        return view('events.show', compact('event', 'follows'));
    }

    public function edit(Event $event){
        $this->authorize('update', $event);
        return view('events.edit', compact('event'));
    }

    public function update(Event $event){
        $this->authorize('update', $event);
        $data = request()->validate([
            'name'  => 'required',
            'description'  => 'required',
            'location'  => 'required',
            'maxpeople'  => 'required',
            'price'  => 'required',

        ]);

        auth()->user()->events()->update($data);
        return redirect("/event/{$event->id}" );
    }
}
