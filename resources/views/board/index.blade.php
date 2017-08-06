@extends('layouts.app')

@section('content')

<div class="container"><br>

    <div class="row">
        @if (Auth::check())
            <div class="col-md-5"></div>
            <div class="col-md-5"></div>
            <div class="col-md-1">
                    <a href="/create" class="btn btn-default pull-right">Create Ad</a>
            </div>
        @else
            <div class="col-md-3"></div>
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <div class="alert alert-info" role="alert" style="text-align: center">
                    For creating Ad's, need <a href="/login" class="alert-link">login</a> or <a href="/register" class="alert-link">register</a>!
                </div>
            </div>
        @endif
    </div>

    <div class="row">

        @include('partials.flash')

        @foreach($boards as $board)
        <div class="col-md-5 col-md-offset-2">
            <div class="list-group">
                <a href="{{'/'.$board->id}}" class="list-group-item">{{$board->title}}</a>
            </div>
        </div>
        <div class="col-md-2">
            <form class="form-horizontal" action="{{ url('/delete/'.$board->id) }}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                        @if( $board->author_name == @Auth::user()->id )
                            <div class="form-group">
                                <a href="{{'/edit/'.$board->id}}" class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger">Delete Ad</button>
                            </div>
                        @endif
                </div>
            </form>
        </div>
        @endforeach

    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {{ $boards->links() }}
        </div>
    </div>

</div>

@endsection
