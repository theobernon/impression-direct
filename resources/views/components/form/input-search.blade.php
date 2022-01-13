<div class="form-group d-flex flex-column">
    <label>{{$label}}</label>
    <select class="selectpicker w-100" data-live-search="true" data-style="btn-danger" name="{{$name}}">
            @foreach($datas as $data)
                <option data-tokens="ketchup mustard">{{$data->$arg}}</option>
            @endforeach
    </select>
</div>
