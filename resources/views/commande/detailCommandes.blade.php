@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    </head>
    <body>
    <div class="mb-3">
        <h1 style="text-align: center" class="m-0 text-dark">Details de la commande n° {{$commande->noCommande}}</h1>
        <a style="border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
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
                {{ $commande->pxttc }}
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
        </x-list-group.group>
    </x-form.card>

    <x-form.card title="Information sur le client" class="col-md-6">
        <x-list-group.group-item label="Référence du client">
            {{ $commande->refClient }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Entité du client">
            {{ $commande->entCli }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Mail du client">
            {{ $commande->mail }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Téléphone du client">
            {{ $commande->tel }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Adresse du client">
            {{ $commande->ad1.' '.$commande->ad3.' '.$commande->ad2 }}
        </x-list-group.group-item>
        <x-list-group.group-item label="Adresse de livraison">
            {{ $commande->livad1.' '.$commande->livad3.' '.$commande->livad2 }}
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
        <x-list-group.group-item label="Impression numérique">
            {{ $commande->impressions_numeriques }}
        </x-list-group.group-item>
    </x-form.card>

        <table id="customers">
            <tr><th colspan="5"; style="text-align: center">Information Commande</th></tr>
            <tr>
                <th>dateCommande</th>
                <td>{{$commande->dateCommande}}</td>
                <th>Produits</th>
                <td><textarea cols="50" rows="1" style="border: none;background: none; text-align: center;" name="dateCommande">{{$commande->produits}}</textarea></td>
            </tr>
            <tr>
                <th>Moyen de Paiement</th>
                <td>{{$commande->mpaiement}}</td>
                <th>Moment du Paiement</th>
                <td>{{$commande->momentPaiement}}</td>
            </tr>
            <tr>
                <th>Nom du PDf</th>
                <td>{{$commande->nomPdf}}</td>
                <th>Date d'expedition</th>
                <td>{{$commande->dateExpd}}</td>
            </tr>
            <tr>
                <th>Prix TTC</th>
                <td>{{$commande->pxttc}} €</td>
            </tr>
            <tr><th colspan="5"; style="text-align: center">Information Client</th></tr>
            <tr>
                <th>Réference du client</th>
                <td><a style="border: none; color: black ;background: none; text-align: center" name="dateCommande" href="{{--route('client.detail', ['refClient'=>$commande->refClient])--}}">{{$commande->refClient}}</a></td>
                <th>Entité Client</th>
                <td>{{$commande->entCli}}</td>
            </tr>
            <tr>
                <th>Mail Client</th>
                <td>{{$commande->mail}}</td>
                <th>Téléphone Cient</th>
                <td>{{$commande->tel}}</td>
            </tr>
            <tr><th colspan="5", style="text-align: center">Adresse Client</th></tr>
            <tr>
                <td style="border-style: none"></td>
                <td>{{$commande->ad1}}</td>
                <td>{{$commande->ad3}}</td>
                <td>{{$commande->ad2}}</td>
                <td style="border-style: none"></td>
            </tr>
            <tr><tr><th colspan="5", style="text-align: center">Adresse Livraison</th></tr>
            <tr>
                <td style="border-style: none"></td>
                <td>{{$commande->livad1}}</td>
                <td>{{$commande->livad3}}</td>
                <td>{{$commande->livad2}}</td>
                <td style="border-style: none"></td>
            </tr>
            <tr><th colspan="5", style="text-align: center">Statut Commande</th></tr>
            <tr>
                <th>Validation Client</th>
                <td>
                    <a href="">
                        @if ($commande->valClient === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
                <th>Commande Expedie</th>
                <td>
                    <a href="">
                        @if ($commande->validee === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
            </tr>
            <tr>
                <th>Commande Expediée</th>
                <td>
                    <a href="">
                        @if ($commande->expediee === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
                <th>Commande Facturée</th>
                <td>
                    <a href="">
                        @if ($commande->facturee === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
            </tr>
            <tr>
                <th>Commande Envoyée</th>
                <td>
                    <a href="">
                        @if ($commande->envoyee === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
                <th>Envoie du Suivi</th>
                <td>
                    <a href="">
                        @if ($commande->envoiSuivi === 0)
                            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @else
                            <svg style="color: green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        @endif
                    </a>
                </td>
            </tr>
            <tr><th colspan="5", style="text-align: center">Information complémentaire</th></tr><tr>
                <th>noColissimo</th>
                <td>{{$commande->noColissimo}}</td>
                <th>BAT</th>
                <td>{{$commande->BAT}}</td>
            </tr>
            <tr>
                <th>Adresse Suivi</th>
                <td>{{$commande->adrSuivi}}</td>
                <th>Option T</th>
                <td>{{$commande->optionT}}</td>
            </tr>
            <tr>
                <th>Impressions Numerique</th>
                <td>{{$commande->impressions_numeriques}}</td>
                <th>Commentaire</th>
                <td>{{$commande->commentaire}}</td>
            </tr>
            <tr>
                <th>Transporteur Client</th>
                <td>{{$commande->transporteurClient}}</td>
                <th>Prix Transporteur</th>
                <td>{{$commande->pxTransporteur}}</td>
            </tr>
            <tr>
                <th>Ref du transporteur</th>
                <td>{{$commande->refTransporteur}}</td>
                <th>Id_Commission</th>
                <td>{{$commande->id_commission}}</td>
            </tr>
            <tr>
                <th>id_NomPdf</th>
                <td>{{$commande->id_NomPdf}}</td>
                <th>Expertise</th>
                <td>{{$commande->expertise}}</td>
            </tr>

        </table>
        <br>

            <button style="border: none" type="submit">
                <a style="margin-right: auto;border-color: red" class="btn">MODIFIER LA COMMANDE</a>
            </button>
    <br>

    </body>

@stop

@section('content')


