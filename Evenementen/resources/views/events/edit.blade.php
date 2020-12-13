@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/event/{{$event->id}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row" style="background-color: white">
                <p class="col-12 h1 text-center">Edit Profile</p>
                <div class="col-8 offset-2" >

                    <div class="form-group row">

                        <label for="name" class="col-form-label">name</label>


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $event->name}}" autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">

                        <label for="description" class="col-form-label">description</label>


                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $event->description }}" autocomplete="description">

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-form-label">location</label>


                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') ?? $event->location }}" autocomplete="location">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="maxpeople" class="col-form-label">Maximum people</label>


                        <input id="maxpeople" type="number" class="form-control @error('maxpeople') is-invalid @enderror" name="maxpeople" value="{{ old('maxpeople') ?? $event->maxpeople}}" autocomplete="maxpeople">

                        @error('maxpeople')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-form-label">price</label>


                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') ?? $event->price}}" autocomplete="price">

                        @error('price')
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
