@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
        <!-- JS SCRIPT-->
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>

    </head>
@stop

@section('content')
    <div>
        <form method="POST" action="{{ route('commande.create')}}">
            @csrf
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <x-form.input label="" id="" value="{{$devis->refClient}}" name="refClient" type="hidden" step="" oninput="" readonly="" required="" ></x-form.input>
    <x-form.card class="mt-4" title="Commande à partir du devis n°{{$devis->noDevis}} pour le client référence n°{{$devis->refClient}}">
        <x-form.input label="Date de la commande" id="" value="{{date('Y-m-d')}}" name="dateCommande" type="date" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Entreprise du client" id="" value="{{$clients[0]->societe}}" name="entCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Adresse du client" id="" value="{{$clients[0]->factAdr1}}" name="ad1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Le code postal du client" id="" value="{{$clients[0]->factAdr2}}" name="ad2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="La ville du client" id="" value="{{$clients[0]->factAdr3}}" name="ad3" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Téléphone associé à la commande" id="" value="{{$clients[0]->tel}}" name="tel" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Mail associé à la commande" id="" :value="$clients[0]->email" name="mailCom" type="" step="" oninput="" readonly="" required="" ></x-form.input>

        <x-form.card-header title="Adresse de facturation"></x-form.card-header>
        <x-form.input label="Nom" id="" value="{{$clients[0]->nom}}" name="livCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Adresse" id="" value="{{$clients[0]->livAdr1}}" name="livAd1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Code Postal" id="" value="{{$clients[0]->livAdr2}}" name="livAd2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Ville" id="" value="{{$clients[0]->livAdr3}}" name="livAd3" type="" step="" oninput="" readonly="" required="" ></x-form.input>

        <x-form.card-header title="Commande"></x-form.card-header>
        <x-form.textarea label="Produits" value="" name="product">@foreach($lignes as $ligne){{$ligne->Produit}}, {{$ligne->TypePapier}}, {{$ligne->couleurPapier}}, {{$ligne->DimPapier}}, {{$ligne->Options}}, {{$ligne->Finitions}}; Qte :{{$ligne->Qte}}; Prix (HT) : {{$ligne->Prix}}€
@endforeach</x-form.textarea>
        <x-form.input label="Réduction" id="" value="" name="reduction" type="number" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.select temp="" name="moyenPaiement" label="Moyen de Paiement" :datas="['Virement Bancaire','Carte Bancaire','Chèque','PayPal','Prélèvement','Autre']"></x-form.select>
        <x-form.select temp="" name="BAT" label="BAT" :datas="['NON','OUI']"></x-form.select>
        <x-form.input label="Le prix de la commande" id="" value="{{$totalHT}}" name="pxttc" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Date d'expédition" id="" value="" name="dateExpedition" type="date" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="Lien de suivi" id="" value="" name="lienSuivi" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.select temp="" name="momentPaiement" label="Moment du Paiement" :datas="['Livraison','Commande']"></x-form.select>

        <x-form.card-header title="Information complémentaire"></x-form.card-header>
        <x-form.textarea label="Commentaire" value="" name="commentaire">@foreach($lignes as $ligne)Commentaire:  {{$ligne->ComEnt}} , {{$ligne->ComCli}}
@endforeach</x-form.textarea>
        <x-form.input-search value="" temp="" label="Transporteur" :datas="$fournisseurs" arg="appellation" name="transporteurClient">
        </x-form.input-search>
        <x-devis.input-search label="Référence du transporteur" name="refTransporteurs" :datas="$fournisseurs" arg="appellation" arg2="reference"></x-devis.input-search>
        <x-form.select temp="" name="expertise" label="Expertise" :datas="['NON','OUI']"></x-form.select>
        <x-form.input label="Prix transporteur" id="" value="" name="pxTransporteur" type="" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input label="N° du devis de la commande" id="" :value="$devis->noDevis" name="noDevisCommande" type="number" step="" oninput="" readonly="" required="" ></x-form.input>
        <x-form.input-commission label="Commission de la commande" name="id_commission" :datas="$commissions"></x-form.input-commission>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-danger float-right">Ajouter la commande</button>
        </div>
    </x-form.card>
        </form>
    </div>
@stop

@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
