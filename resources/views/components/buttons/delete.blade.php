<form method="post" action="{{$route}}">
    @csrf
    <button class="btn btn-danger btn-sm {{$class}}" type="submit">
        {!! $slot=='' ? '<i class="fa fa-trash"></i>' : $slot !!}
    </button>
</form>
