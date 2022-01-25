@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <h1 class="m-0 text-dark">Liste des commandes</h1>

    <p>ici s'afficheront toutes les commandes depuis l'année dernière</p>
    <a style="margin-right: auto;border-color: red" href="/commandes/formulaire" class="btn">AJOUTER UNE COMMANDE</a>
@stop

@section('content')
<div>
    <table class="table table-bordered table-striped datatable table-responsive">
        <thead>
        <tr>
            <th>Num Commande</th>
            <th style="width: 10px">Nom de l'entreprise</th>
            <th>Prix TTC</th>
            <th>Moyen payement</th>
            <th>Date commande</th>
            <th>Numéro de Devis</th>
            <th>Validation Client</th>
            <th>Validation</th>
            <th>Expedition</th>
            <th>Facture</th>
            <th>Mail Facture</th>
            <th>Mail suivi</th>
            <th>Détail</th>
            <th>Supprimer</th>

        </tr>
        </thead>
        <!---->
        <tbody>
        @foreach ($commandes as $commande)
            <tr>
                <td>{{$commande->noCommande}}</td>
                <td>{{$commande->entCli}}</td>
                <td>{{$commande->pxttc}}€</td>
                <td>{{$commande->mpaiement}}</td>
                <td>{{substr($commande->dateCommande,0,10)}}</td>
                <td>{{$commande->noDevis}}</td>
                <td>
                    <x-check :value="$commande->valClient" url="{{route('commande.validerClient',['noCommande'=>$commande->noCommande])}}"></x-check>
                </td>
                <td>
                    <x-check :value="$commande->validee" url="{{route('commande.validerCommande',['noCommande'=>$commande->noCommande])}}"></x-check>
                </td>
                <td>
                    <x-check :value="$commande->expediee" url="{{route('commande.expedierCommande',['noCommande'=>$commande->noCommande])}}"></x-check>
                </td>
                <td>
                    <x-commande.button-facture :value="$commande"></x-commande.button-facture>
                </td>
                <td>
                    <x-check :value="$commande->envoyee" url="/mail/mailFacture"></x-check>
                </td>
                <td>
                    <x-check :value="$commande->envoiSuivi" url=""></x-check>
                </td>
                <td>
                    <x-buttons.show id="{{$commande->noCommande}}" route="{{route('commandes.detail',$commande->noCommande)}}"></x-buttons.show>
                </td>
                <td>
                    <x-buttons.delete class="" route="{{route('commande.delete',['noCommande'=>$commande->noCommande])}}"></x-buttons.delete>
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
            order: [[4, "desc"]],
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
