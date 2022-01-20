<div class="form-group d-flex flex-column">
    <label>{{$label}}</label>
    <select class="selectpicker w-100" data-live-search="true" data-style="btn-danger" name="{{$name}}">
        @foreach($datas as $data)
            <option value="{{$data->$arg2}}">{{$data->$arg.' : '.$data->$arg2}}</option>
        @endforeach
    </select>
</div>
