@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row" style="background-color: white">
                <p class="col-12 h1 text-center">Edit Profile</p>
                <div class="col-8 offset-2" >

                    <div class="form-group row">

                        <label for="firstname" class="col-form-label">Firstname</label>


                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ?? $user->profile->firstname }}" autocomplete="firstname">

                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">

                        <label for="lastname" class="col-form-label">Lastname</label>


                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $user->profile->lastname }}" autocomplete="lastname">

                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="age" class="col-form-label">Age</label>


                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? $user->profile->age}}" autocomplete="age">

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="school" class="col-form-label">School</label>


                        <input id="school" type="text" class="form-control @error('school') is-invalid @enderror" name="school" value="{{ old('school') ?? $user->profile->school}}" autocomplete="school">

                        @error('school')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-form-label">Description</label>


                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description}}" autocomplete="description">

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="favoritesong" class="col-form-label">Favorite song</label>


                        <input id="favoritesong" type="text" class="form-control @error('favoritesong') is-invalid @enderror" name="favoritesong" value="{{ old('favoritesong') ?? $user->profile->favoritesong}}" autocomplete="favoritesong">

                        @error('favoritesong')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="row pb-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
@endsection
