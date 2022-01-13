@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">

        <!-- JS SCRIPT-->
        <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    </head>

    <body>
    @foreach ($devis as $devi)
        <h1 style="text-align: center">Création d'une commande à partir du Devis N°{{$devi->noDevis}} pour le client N°{{$devi->refClient}}</h1>
    @endforeach
    <div style="display: flex">
        <form method="POST" action="{{ route('commande.create')}}">
            @csrf
                <br>
                <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
                <br>
                <br>
                @foreach ($devis as $devi)
                <input type="hidden" style="background: none" name="refClient" id="refClient" value="{{$devi->refClient}}">
                @endforeach
                <div>
                    <label>Saisissez la date de la commande :</label>
                    <input type="date" name="dateCommande" id="dateCommande" value="{{date('Y-m-d')}}" onFocus="this.value='';">
                </div>
            @foreach ($clients as $client)
                <div>
                    <label>Saisissez l'entreprise du client:</label>

                    <input type="text" name="entCli" id="entCli" value="{{$client->societe}}" required>
                    <label>Saisissez l'adresse du client :</label>
                    <input type="text" name="adCom1" id=adCom1" value="{{$client->factAdr1}}" required>
                </div>
                <div>
                    <label>Saisissez le code postal du client :</label>
                    <input type="text" name="adCom2" id="adCom2" value="{{$client->factAdr2}}" required>
                    <label>Saisissez la ville du client :</label>
                    <input type="text" name="adCom3" id="adCom3" value="{{$client->factAdr3}}" required>
                </div>
                <div>
                    <label>Saisissez le téléphone associé à la commande :</label>
                    <input type="text" name="tel" id="tel" value="@if($client->tel===null or $client->tel==='') {{$client->mobile}} @elseif($client->mobile===null or $client->mobile==='') {{$client->fax}} @else {{$client->tel}} @endif" required>
                    <label>Saisissez le mail associé à la commande :</label>
                    <input type="text" name="mailCom" id="mailCom" value="{{$client->email}}" required>
                </div>
                <br>
                <div>
                    <label>Saisissez le nom de livraison de la commande :</label>
                    <input type="text" name="livCli" id="livCli" value="{{$client->nom}}" required>
                </div>
                <div>
                    <label>Saisissez l'adresse de livraison de la commande :</label>
                    <input type="text" name="livAdrCom1" id="livAdrCom1" value="{{$client->livAdr1}}" required>
                </div>
                <div>
                    <label>Saisissez le code postal de livraison de la commande :</label>
                    <input type="text" name="livAdrCom2" id="livAdrCom2" value="{{$client->livAdr2}}" required>
                </div>
                <div>
                    <label>Saisissez la ville de livraison de la commande :</label>
                    <input type="text" name="livAdrCom3" id="livAdrCom3" value="{{$client->livAdr3}}" required>
                </div>
                <div>
                    <label>Saisissez le produit de la commande :</label>
                    <textarea type="text" name="produitsCom" id="produitsCom" required>
                        Produit: @foreach($lignes as $ligne){{$ligne->Produit}},{{$ligne->TypePapier}},{{$ligne->couleurPapier}},{{$ligne->DimPapier}},{{$ligne->Options}},{{$ligne->Finitions}},Qte :{{$ligne->Qte}},PrixHT: {{$ligne->Prix}}€  @endforeach
                    </textarea>
                </div>
                <div>
                    <label>Saisissez la réduction de la commande :</label>
                    <input type="number" step="any" name="reduction" id="reduction">
                </div>
                <div>
                    <label>Saisissez le moyen de paiement de la commande :</label>
                    <select id="moyenPaiement" name="moyenPaiement" required>
                        <option>Virement Bancaire</option>
                        <option>Carte Bancaire</option>
                        <option>Chèque</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div>
                    <label>Saisissez le prix de la commande :</label>
                    <input type="text" name="pxttc" id="pxttc" value="{{$totalHT}}" required>
                </div>
                <div>
                    <label>BAT de la commande :</label>
                    <select name="BAT" id="BAT">
                        <option>NON</option>
                        <option>OUI</option>
                    </select>
                </div>
                <div>
                    <label>Saisissez la date d'éxpedition de la commande :</label>
                    <input type="date" name="dateExpedition" id="dateExpedition">
                </div>
                <div>
                    <label>Saisissez le lien de suivi de la commande :</label>
                    <input type="text" name="lienSuivi" id="lienSuivi" required>
                </div>
                <div>
                    <label>Saisissez le moment de paiement de la commande :</label>
                    <input type="text" name="momentPaiement" id="momentPaiement" value="commande" required>
                </div>
                <div>
                    <label>Saisissez un commentaire pour la commande :</label>

                    <textarea name="commentaire" id="commentaire" >
                        @foreach($lignes as $ligne)
                      Commentaire:  {{$ligne->ComEnt}} , {{$ligne->ComCli}}
                        @endforeach
                    </textarea>
                </div>
                <div>
                    <label>Saisissez le transporteur de la commande :</label>
                    <select id="transporteurClient" name="transporteurClient" required>
                        @foreach ($fournisseurs as $transporteur)
                            <option value="{{$transporteur->appellation}}" onFocus="this.value='';">{{$transporteur->appellation}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label>Saisissez la référence du transporteur :</label>
                    <select type="text" name="refTransporteurs" id="refTransporteurs">
                        @foreach ($fournisseurs as $transporteur)
                            <option value="{{$transporteur->reference}}" onFocus="this.value='';">{{$transporteur->appellation}}  référence: {{$transporteur->reference}}</option>
                        @endforeach
                        <option value="0">Aucun</option>
                    </select>
                </div>
                <div>
                    <label>Expertise de la commande :</label>
                    <select name="expertiseCommande" id="expertiseCommande">
                        <option>OUI</option>
                        <option>NON</option>
                    </select>
                </div>
                <div>
                    <label>Saisissez le prix du transporteur :</label>
                    <input type="text" name="pxTransporteur" id="pxTransporteur">
                </div>
                <div>
                    <label>Saisissez le numéro de devis associé à la commande :</label>
                    @foreach($devis as $devi)
                    <input type="number" name="noDevisCommande" id="noDevisCommande" value="{{$devi->noDevis}}">
                    @endforeach
                </div>

                <div>
                    <label>Saisissez la commission de la commande :</label>
                    <select name="id_commission" id="id_commission">
                        @foreach($commissions as $com)
                            <option value="{{$com->id}}">{{$com->taux}} %</option>
                        @endforeach
                    </select>
                </div>

                <button style="border: none" type="submit">
                    <a style="margin-right: auto;border-color: red" class="btn">AJOUTER LA COMMANDE</a>
                </button>
            @endforeach
        </form>
    </div>
    <br>
    </body>
    <script>

    </script>
@stop

@section('content')
