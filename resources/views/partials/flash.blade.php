@if (Session::has('message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4 alert alert-success">
            <em>{{ session('message') }}}</em>
        </div>
    </div>
@endif