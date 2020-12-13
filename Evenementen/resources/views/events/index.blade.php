@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Auth::check())

            <a href="/event/create">create a event</a>
        @endif
        <div class="row ">
            @foreach($event as $e)
              <div class="col-3 pt-3 pb-4 mr-3 mb-3" style="background-color: white; border: 1px solid lightgray;">
                  <h1>{{$e->name}}</h1>
                  <p>{{$e->description}}</p>
                  <a class="btn btn-primary" href="/event/{{$e->id}}">Meer informatie</a>
              </div>


            @endforeach



        </div>


    </div>
@endsection
