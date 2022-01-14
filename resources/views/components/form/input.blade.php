<div class="form-group">
    <label for="">{{__($label)}}</label>
<<<<<<< Updated upstream
    <input type="{{$type ?? 'text'}}" step="{{$step ?? ''}}" onchange="{{$onchange ?? ''}}" class="form-control" id="" name="{{$name}}" value="{{$value ?? ''}}" {{$readonly ?? ''}} {{$required ?? ''}}>
=======
    <input type="{{$type ?? 'text'}}" oninput="{{$oninput}}" class="form-control" id="{{$id}}" name="{{$name}}" value="{{$value ?? ''}}" {{$readonly ?? ''}} {{$required ?? ''}}>
>>>>>>> Stashed changes
</div>
