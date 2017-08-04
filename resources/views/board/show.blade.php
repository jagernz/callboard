@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="jumbotron col-md-8 col-md-offset-2">
                <h1>{{$board->title}}</h1>
                <hr>
                <p>{{$board->description}}</p>
                <div class="row">
                    <div class="col-md-2">
                        <span>{{$author->name}}</span>
                    </div>
                    <div class="col-md-2 col-md-offset-8">                    <span>{{$board->updated_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
