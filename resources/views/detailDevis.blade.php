@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
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
        <table class="fl-table">
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
                    <td><a href="">
                            @if ($dLigne->Envoye === 0)
                                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            @else
                                <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            @endif
                        </a></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <br>
    @foreach($devis as $dligne)
    <a style="margin-right: auto;border-color: red" href="/ligneDevis/form/{{$dligne->noDevis}}"  class="btn">AJOUTER UNE LIGNE</a>
    @endforeach
    </body>

@stop

@section('content')

