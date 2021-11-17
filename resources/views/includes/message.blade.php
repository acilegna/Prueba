@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


@if (session('message_danger'))
    <div class="alert alert-danger">
        {{ session('message_danger') }}
    </div>
@endif
