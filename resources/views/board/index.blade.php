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
        @foreach($boards as $board)
        <div class="col-md-4 col-md-offset-4">
            <div class="list-group">
                <a href="{{'/'.$board->id}}" class="list-group-item">{{$board->title}}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
