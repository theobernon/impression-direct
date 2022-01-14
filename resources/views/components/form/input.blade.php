<div class="form-group">
    <label for="">{{__($label)}}</label>
    <input type="{{$type ?? 'text'}}" oninput="{{$oninput}}" class="form-control" id="{{$id}}" name="{{$name}}" value="{{$value ?? ''}}" {{$readonly ?? ''}} {{$required ?? ''}}>
</div>
