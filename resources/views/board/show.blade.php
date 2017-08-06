@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="jumbotron">
                    <h1>{{$board->title}}</h1>
                    <hr>
                    <p>{{$board->description}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <span>{{$authorName}}</span>
                        </div>
                        <div class="col-md-2 col-md-offset-8"><span>{{$board->updated_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <form class="form-horizontal" action="{{ url('/delete/'.$board->id) }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        @if( $access )
                            <a href="{{'/edit/'.$board->id}}" class="btn btn-warning">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete Ad</button>
                        @endif
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection
