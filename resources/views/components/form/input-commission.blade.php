<div class="form-group">
    <label>{{$label}}</label>
    <select name="id_commission" id="id_commission" class="form-control">
        @foreach($datas as $data)
            <option value="{{$data->id}}">{{$data->taux}} %</option>
        @endforeach
    </select>
</div>
