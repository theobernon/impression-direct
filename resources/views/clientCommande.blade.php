@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')


@foreach($commandes as $commande)
    <h1 class="m-0 text-dark">Liste des commandes du client n°{{$commande->refClient}}</h1>
@endforeach
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

    </head>
    @include('flash-message')

    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>

    <br>
    <br>

    <div style="overflow-x: auto;">
        <table style="" class="fl-table">
            <thead>
            <tr>
                <th>Num Commande</th>
                <th>No Devis</th>
                <th>Prix TTC</th>
                <th>Produit</th>
                <th>Date commande</th>
                <th>Détail</th>
                <th>Supprimer</th>

            </tr>
            </thead>

            <tbody>
            @foreach ($commandes as $commande)
                <tr>
                    <td>{{$commande->noCommande}}</td>

                    <td>n°DEVIS TODO</td>

                    <td>{{$commande->pxttc}}€</td>
                    <td style="">{{$commande->produits}}</td>
                    <td>{{substr($commande->dateCommande,0,10)}}</td>
                    <td>
                        <form method="GET" id="{{$commande->noCommande}}" action="{{route('commandes.detail',$commande->noCommande)}}">
                            @csrf
                            <button style="border: none;background: none;" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>

                        </form>
                    </td>
                    <td>
                        <form method="POST" id="{{$commande->noCommande}}" action="{{route('commande.delete',$commande->noCommande)}}">
                            @csrf
                            <button style="border: none;background: none;" type="submit">
                                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop
