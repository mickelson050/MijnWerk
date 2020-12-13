@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/event" method="post">
            @csrf
            <div class="row" style="background-color: white">
                <p class="col-12 h1 text-center">Create new event</p>
                <div class="col-8 offset-2" >

                    <div class="form-group row">

                        <label for="name" class="col-form-label">Name</label>


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-form-label">Description</label>


                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" autocomplete="description">

                        @error('description')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-form-label">Location</label>


                        <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" autocomplete="location">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="maxpeople" class="col-form-label">Maximum number of people</label>


                        <input id="maxpeople" type="number" class="form-control @error('maxpeople') is-invalid @enderror" name="maxpeople" value="{{ old('maxpeople') }}" autocomplete="maxpeople">

                        @error('maxpeople')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-form-label">Price</label>


                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" autocomplete="price">

                        @error('price')
                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                        @enderror

                    </div>

                    <div class="row pb-4">
                        <button class="btn btn-primary">Create new event</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
