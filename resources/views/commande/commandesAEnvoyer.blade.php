@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des commandes</h1>
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>

    <p>Ici s'afficherons les commandes qui n'ont pas été envoyées</p>
    <br><br>
    <div style="overflow-x: auto;">
        <table class="table table-bordered table-striped datatable">
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
                <th>Envoyee</th>
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
                        <td>
                            <x-check :value="$commande->envoyee" url=''>
                            </x-check>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            responsive: true,
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
