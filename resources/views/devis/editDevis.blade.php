@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1>Modifier le devis n°{{$devis->noDevis}}</h1>
@stop
@section('content')
<body>
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div>
        <form method="POST" action="{{ route('devis.update',['noDevis'=>$devis->noDevis])}}">
        @csrf
            <x-form.card title="Modifier un devis" class="mt-5 w-50">
                <x-form.group value="{{date('Y-m-d',strtotime($devis->dateDevis))}}" label="Date du devis" type="date" id="dateDevis" required=""></x-form.group>
                <x-form.group value="{{$devis->refClient}}" label="Référence du client" type="" id="refClient" required=""></x-form.group>
                <x-form.input-list value="{{$devis->tva}}" :datas="['30','20','10','5']" label="TVA :" name="tva" list="tvaList"></x-form.input-list>
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger float-right">Valider</button>
                </div>
            </x-form.card>
        </form>
        <br>
    </div>

</body>
@stop
