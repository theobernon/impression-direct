<div class="form-group">
    <label for="">{{__($label)}}</label>
    <input type="{{$type ?? 'text'}}" step="{{$step ?? ''}}" onchange="{{$onchange ?? ''}}" class="form-control" id="" name="{{$name}}" value="{{$value ?? ''}}" {{$readonly ?? ''}} {{$required ?? ''}}>
</div>
