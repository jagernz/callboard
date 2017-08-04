@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <form class="form-horizontal" action="{{ url('/store') }}" method="POST">
                {{csrf_field()}}
                <fieldset>
                    <legend>Create your Ad!</legend>

                    @include('partials.errors')

                    <div class="form-group">
                        <label for="inputText" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textArea" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <a href="/" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Ad</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>

@endsection