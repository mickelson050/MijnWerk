@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-3 ">
                <h1 class="pb-3">{{$event->name}}</h1>
                <follow-button user-id="{{$event->id}}" follows="{{$follows}}"></follow-button>
            </div>
            <div class="col-6">
                <h1>Beschrijving</h1>
                <p>{{$event->description}}</p>

            </div>
            <div class="col-3">
             @can('update', $event)
                <a href="/event/{{$event->id}}/edit" class="btn btn-primary">Edit event</a>
             @endcan
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                <table>
                    <tr>
                        <p class="h3">informatie</p>
                    </tr>
                    <tr>
                        <td>Locatie: {{$event->location}}</td>

                    </tr>

                    <tr>
                        <td>Prijs: {{$event->price}}</td>
                    </tr>
                </table>

            </div>
            <div class="col-6">
                    <p class="h1">Aanwezigen({{$event->followers->count()}}/{{$event->maxpeople}})</p>
                    <P>
                        <table>
                            @foreach($event->followers as $followers)
                               <tr>
                                   <td>
                                       {{$followers->profile->firstname}} {{$followers->profile->lastname}}
                                   </td>
                               </tr>

                            @endforeach
                        </table>
                    </P>

            </div>
        </div>

    </div>
@endsection
