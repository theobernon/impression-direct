<form method="GET"  action="{{$route}}">
    @csrf
    <button type="submit" class="btn btn-danger float-right">{{$slot}}</button>
</form>
