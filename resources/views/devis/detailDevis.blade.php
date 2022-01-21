@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="id=edge" />
    </head>
    <body>
    @foreach($devis as $dLigne)
        <h1 style="text-align: center" class="m-0 text-dark">Detail du devis n°{{$dLigne->noDevis}}</h1>
    @endforeach
        <a style="border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <br>
    <br>
        <div style="overflow-x: auto">
        <table class="table table-bordered table-striped datatable">
            <thead>
            <tr>
                <th>noLigne</th>
                <th>noDevis</th>
                <th>Produit</th>
                <th>Type de Papier</th>
                <th>Couleur du papier</th>
                <th>DimensionPapier</th>
                <th>Impression Recto</th>
                <th>Impression Verso</th>
                <th>Option</th>
                <th>Finitions</th>
                <th>Délai sous-traitant</th>
                <th>Supplier</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Envoyé</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($devisLigne as $dLigne)
                <tr>
                    <td>{{$dLigne->noLigne}}</td>
                    <td>{{$dLigne->noDevis}}</td>
                    <td>{{$dLigne->Produit}}</td>
                    <td>{{$dLigne->TypePapier}}</td>
                    <td>{{$dLigne->couleurPapier}}</td>
                    <td>{{$dLigne->DimPapier}}</td>
                    <td>{{$dLigne->ImpRecto}}</td>
                    <td>{{$dLigne->ImpVerso}}</td>
                    <td>{{$dLigne->Options}}</td>
                    <td>{{$dLigne->Finitions}}</td>
                    <td>{{$dLigne->SousTraitant}}</td>
                    <td>{{$dLigne->Supplier}}</td>
                    <td>{{$dLigne->Qte}}</td>
                    <td>{{$dLigne->Prix}}</td>
                    <td>
                        <x-check value="{{$dLigne->Envoye}}" url=""></x-check>
                    </td>
                    <td class="d-flex">
                        <x-buttons.edit route="{{route('devis.editLigne',['noLigne'=>$dLigne->noLigne])}}"></x-buttons.edit>
                        <x-buttons.delete route="{{route('devis.deleteLigne',['noLigne'=>$dLigne->noLigne])}}" class="ml-2"></x-buttons.delete>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br>

    <a style="margin-right: auto;border-color: red" href="/ligneDevis/form/{{$devis[0]->noDevis}}"  class="btn">AJOUTER UNE LIGNE</a>
    </body>

@stop

@section('content')

