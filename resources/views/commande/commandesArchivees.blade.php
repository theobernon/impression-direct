@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <h1 class="m-0 text-dark">Liste des commandes archivées</h1>

    <p>ici s'afficheront les commandes archivées</p>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Commandes Archivées
            </h3>
            <div class="card-tools">
                <form method="GET" action="{{route('search.commandeArchivees')}}">
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
                        <th>N° Commande</th>
                        <th>Nom de l'entreprise</th>
                        <th>Prix TTC</th>
                        <th>Moyen Paiement</th>
                        <th>Date Commande</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($commandes as $commande)
                    <tr>
                        <td>{{$commande->noCommande}}</td>
                        <td>{{$commande->entCli}}</td>
                        <td>{{$commande->pxttc}}</td>
                        <td>{{$commande->mpaiement}}</td>
                        <td>{{$commande->dateCommande}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
