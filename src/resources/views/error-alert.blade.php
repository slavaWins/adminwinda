
@if ($errors->all())
    @foreach ($errors->all() as $V)
        <div class="row">
            <div class="  m-4 p-4 alert alert-danger">
                {{$V}}
            </div>
        </div>
    @endforeach
@endif
