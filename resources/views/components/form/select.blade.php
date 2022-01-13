<div class="form-group">
    <label>{{$label}}</label>
    <select class="form-control" name="{{$name}}">
        @foreach($datas as $data)
            <option>{{$data}}</option>
        @endforeach
    </select>
</div>
