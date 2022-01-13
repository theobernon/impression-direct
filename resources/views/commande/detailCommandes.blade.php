@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    </head>
@stop
@section('content')
    <div class="mb-3">
        <h1 style="text-align: center" class="m-0 text-dark">Details de la commande n° {{$commande->noCommande}}</h1>
        <x-buttons.back></x-buttons.back>
    </div>
    <row class="d-flex">
    <x-form.card title="Information sur la commande" class="col-md-6">
        <x-list-group.group>
            <x-list-group.group-item label="Produit">
                {{ $commande->produits }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Moyen de paiement">
                {{ $commande->mpaiement }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Date de commande">
                {{ date('d-m-Y H:i:s', strtotime($commande->dateCommande)) }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Prix TTC">
                {{ $commande->pxttc.'€'}}
            </x-list-group.group-item>
            <x-list-group.group-item label="Moment de paiement">
                {{ $commande->momentPaiement }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Date d'expédition">
                {{ date('d-m-Y H:i:s', strtotime($commande->dateExpd)) }}
            </x-list-group.group-item>
            <x-list-group.group-item label="BAT">
                {{ $commande->BAT }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Nom du PDF">
                {{ $commande->nomPdf }}
            </x-list-group.group-item>
            <x-list-group.group-check>
                <b>{{__('Validation du client')}}</b>
                <span class="float-right"><x-check :value="$commande->valClient" url=''></x-check></span>
                <br/>
                <b>{{__('Validation de la commande')}}</b>
                <span class="float-right"><x-check :value="$commande->validee" url=''></x-check></span>
                <br/>
                <b>{{__('Expédition de la commande')}}</b>
                <span class="float-right"><x-check :value="$commande->expediee" url=''></x-check></span>
                <br/>
                <b>{{__('Facturation de la commande')}}</b>
                <span class="float-right"><x-check :value="$commande->facturee" url=''></x-check></span>
                <br/>
                <b>{{__('Envoi de la commande')}}</b>
                <span class="float-right"><x-check :value="$commande->envoyee" url=''></x-check></span>
                <br/>
                <b>{{__('Envoi du suivi')}}</b>
                <span class="float-right"><x-check :value="$commande->envoiSuivi" url=''></x-check></span>
            </x-list-group.group-check>
            <x-list-group.group-item label="Adresse de facturation">
                {{ $commande->ad1.' '.$commande->ad3.' '.$commande->ad2 }}
            </x-list-group.group-item>
            <x-list-group.group-item label="Adresse de livraison">
                {{ $commande->livad1.' '.$commande->livad3.' '.$commande->livad2 }}
            </x-list-group.group-item>
        </x-list-group.group>
    </x-form.card>

    <x-form.card title="Information sur le client" class="col-md-6">
        <x-list-group.group-item label="Référence du client">
            {{ $commande->client->refClient }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Nom du client">
            {{ $commande->client->nom }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Prénom du client">
            {{ $commande->client->prenom }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Entité du client">
            {{ $commande->entCli }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Mail du client">
            {{ $commande->client->email }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Téléphone du client">
            {{ $commande->client->tel }}
        </x-list-group.group-item>
    </x-form.card>
    </row>
    <x-form.card title="Information Complémentaire" class="">
        <x-list-group.group-item label="Numéro du Colissimo">
            {{ $commande->noColissimo }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Adresse du suivi">
            {{ $commande->adrSuivi }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Option T">
            {{ $commande->commentaire }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Impression numérique">
            {{ $commande->impressions_numeriques }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Commentaire">
            {{ $commande->commentaire }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Option T">
            {{ $commande->optionT }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Prix Transporteur">
            {{ $commande->pxTransporteur }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Réf du transporteur">
            {{ $commande->refTransporteur }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Id Commission">
            {{ $commande->id_commission }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Id nom PDF">
            {{ $commande->id_NomPdf }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Expertise">
            {{ $commande->expertise }}
        </x-list-group.group-item>
    </x-form.card>
    <button style="border: none" type="submit" class="mb-3">
        <a style="margin-right: auto;border-color: red" class="btn">MODIFIER LA COMMANDE</a>
    </button>

@stop
