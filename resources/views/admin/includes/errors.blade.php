<div id="validateDiv">
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="list-group-item text-danger">
                {{$error}}
            </div>
        @endforeach

    @endif
</div>