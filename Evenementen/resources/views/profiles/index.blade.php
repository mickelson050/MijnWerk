@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-3 ">
                <h1 class="pb-3">{{$user->profile->firstname}} {{$user->profile->lastname}}</h1>
                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit" class="btn btn-primary">edit profile</a>
                @endcan

            </div>
            <div class="col-6">
                <h1>Over {{$user->profile->firstname}}</h1>
                <p>{{$user->profile->description}}</p></div>

        </div>
        <div class="row">
            <div class="col-3">
                <table>
                    <tr>
                        <p class="h3">gegevens</p>
                    </tr>
                    <tr>
                        <td>Locatie: {{$user->profile->age}}</td>

                    </tr>

                    <tr>
                        <td>Prijs: {{$user->profile->school}}</td>
                    </tr>
                </table>

            </div>
            <div class="col-6"><tr>
                    {{$user->profile->favoritesong}}

            </div>
        </div>

    </div>
@endsection
