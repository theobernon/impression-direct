<div class="form-group col-sm-6">
<label for="">{{$label}}</label>
<input type="text" name="{{$name}}" value="{{$value}}" class="form-control" id="{{$name}}" list="{{$list}}" required>
<datalist id="{{$list}}">
    @foreach($datas as $data)
        <option>{{$data}}</option>
    @endforeach
</datalist>
</div>
