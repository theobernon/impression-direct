<form method="POST" action="{{$action}}">
    @csrf
    @if($method!='POST')
        @method($method)
    @endif
    {{$slot}}
</form>
