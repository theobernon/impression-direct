<div class="form-group col-sm-6">
    <label for="{{$id}}">{{$label}}</label>
    <input type="{{$type ?? 'text'}}" class="form-control w-100" id="{{$id}}" name="{{$id}}" placeholder="{{$label}}" value="{{$value}}" {{$required}}>
</div>
