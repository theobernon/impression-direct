@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des commandes</h1>
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>

    <p>Ici s'afficherons les commandes à facturer</p>
    <br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Liste des commandes
            </h3>
            <div class="card-tools">
                <form method="GET" action="{{route('commande.aFacturer.search')}}">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="q" class="form-control float-right" placeholder="Recherche..">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Num Commande</th>
                    <th style="width: 10px">Nom de l'entreprise</th>
                    <th>Prix TTC</th>
                    <th>Moyen payement</th>
                    <th>Date commande</th>
                    <th>Validation Client</th>
                    <th>Commande validee</th>
                    <th>Commande Expédier</th>
                    <th>date d'expedition</th>
                    <th>Facture</th>
                    <th>Num Facture</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commandes->commandes as $commande)
                    @if ($commande->facturee ===0)
                        <tr>
                            <td>{{$commande->noCommande}}</td>
                            <td>{{$commande->entCli}}</td>
                            <td>{{$commande->pxttc}}</td>
                            <td>{{$commande->mpaiement}}</td>
                            <td>{{$commande->dateCommande}}</td>
                            <td>
                                <x-check :value="$commande->valClient" url=''>
                                </x-check>
                            </td>
                            <td>
                                <x-check :value="$commande->validee" url=''>
                                </x-check>
                            </td>
                            <td>
                                <x-check :value="$commande->expediee" url=''>
                                </x-check>
                            </td>
                            <td>{{$commande->dateExpd}}</td>
                            <td>
                                <x-check :value="$commande->facturee" url=''>
                                </x-check>
                            </td>
                            <td>{{$commande->nomPdf}}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mr-2">
                {{($pagination->links('pagination::bootstrap-4'))}} {{--Pagination Links--}}
            </div>
        </div>
@stop
