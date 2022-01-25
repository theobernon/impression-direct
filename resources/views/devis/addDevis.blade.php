@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <link href="{{asset('style.css')}}" rel="stylesheet">
@stop
@section('content')
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div>
        <form method="POST" action="{{ route('devis.create')}}">
        @csrf
            <x-form.card title="Ajout d'un devis" class="mt-5 w-50">
                <x-form.group value="{{date('Y-m-d')}}" label="Date du devis" type="date" id="dateDevis" required=""></x-form.group>
                <div>
                <x-form.group value="" label="Référence du client" type="" id="refClient" required=""></x-form.group>
                    <a href="{{route('client.index')}}">Rechercher un client</a>
                </div>
                <x-form.input-list value="" :datas="['30','20','10','5']" label="TVA :" name="tva" list="tvaList"></x-form.input-list>
                <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger float-right">Valider</button>
                </div>
            </x-form.card>
        </form>
        <br>
    </div>
@stop
