<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML 2 PDF</title>
    <style type="text/css">
        body{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        .center {
            text-align: center;
        }
        .right {
            text-align: right;
        }
        .left {
            width: 100vw;
            text-align: left;
        }
        .flotte{
            float: left;
        }
        table {
            border-collapse: collapse;
            border: 1px solid black;
            border: none;
        }
        table  th {
            border: 1px solid black;
            padding: 5px;
        }
        table  td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        .border {
            border: none;
        }
        .centerTable {
            margin-left: auto;
            margin-right: auto;
        }
        .row {
            display: flex;
        }
        .column {
            flex: 50%;
            padding: 10px;
            height: 150px; /* Should be removed. Only for demonstration */
        }
        .columnHeader {
            padding: 10px;
            height: 150px; /* Should be removed. Only for demonstration */
        }
        .inline
        {
            display: inline-block;
            vertical-align: top;

        }
        .centerTable {
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }
    </style>
</head>

<body>

<div>
    <div class="inline">
        <img src="https://procamping85.com/wp-content/uploads/2020/11/Impression-Direct1250pixels.jpg" height="50" width="125">
    </div>
    <div class="inline" style="font-size: 12px" >
        <p>
            Impression Direct
            <br>85170 LE POIRE SUR VIE
            <br> TEL. : 51 34 65 30
            <br> Fax : 09 72 11 87 10
            <br><a href="http://www.impressiondirect.fr/">www.impressiondirect.fr</a>
            <br><a href="mailto: contact@impressiondirect.fr">contact@impressiondirect.fr</a>
        </p>
    </div>
    <div class="inline" style="text-align:right;">
        <img src="images/imprimVert.png" height="55">
        <img src="images/pefc.png" height="55">
        <img src="images/Fsc.jpg" height="55">
        <img src="images/ISO-9001-Logo-HR.png" height="55">
        <img src="images/ISO-14001-Logo-HR.png" height="55">
    </div>
</div>


<h1 class="center">Devis</h1>

<div class="right">
    <div class="inline" style="font-size: 11px">
        <p>
            <b>Adresse de facturations</b>
            <br>
            <br>
            {{-- {{dd($devis)}} --}}
            {{-- {{dd($devisLigne)}} --}}
            {{$clients[0]->societe ?? ''}}
            <br>{{$clients[0]->nom ?? ''}} {{$clients[0]->prenom ?? ''}}
            <br>{{$clients[0]->factAdr1 ?? ''}}
            <br>{{$clients[0]->factAdr2 ?? ''}} {{$clients[0]->factAdr3 ?? ''}}
            <br>{{$clients[0]->tel ?? ''}}
        </p>
    </div>
    <div class="inline" style="font-size: 11px;">
        <p>
            <b>Adresse de livraison si différentes</b>
            <br>
            <br>
            .....................................................
            <br>.....................................................
            <br>.....................................................
            <br>.....................................................
            <br>.....................................................
        </p>
    </div>
</div>

<div style="font-size: 11px">
    <p>Ref : {{$devis->noDevis ?? ''}}
    <br>Date : {{$devis->dateDevis ?? ''}}</p>
</div>

<table class="centerTable">
    <thead>
    <tr>
        <th>Désignation</th>
        <th>Quantité</th>
        <th>Prix</th>
    </tr>
    </thead>
    <tbody style="font-size:11px">
    @foreach($lignes as $ligne)
    <tr>
        <td>
            {{$ligne->Produit ?? ''}}
            @if ($ligne->TypePapier != null)
                <br>Papier : {{$ligne->TypePapier ?? ''}}
            @endif

            @if ($ligne->DimPapier != null)
                - Dimensions : {{$ligne->DimPapier ?? ''}}
            @endif

            @if ($ligne->couleurPapier != null)
                - Couleur : {{$ligne->couleurPapier ?? ''}}
            @endif

            @if ($ligne->ImpRecto != null)
                <br>Impression : {{$ligne->ImpRecto ?? ''}} Recto, 
            @endif

            @if ($ligne->ImpVerso != null)
                {{$ligne->ImpVerso}} Verso
            @endif

            @if ($ligne->SousTraitant != null)
                <br>Délai de fabrication : {{$ligne->SousTraitant ?? ''}}
            @endif

            @if ($ligne->Finitions != null)
                <br>Délai de fabrication : {{$ligne->Finitions ?? ''}}
            @endif

            @if ($ligne->Options != null)
                <br>Options : {{$ligne->Produit ?? ''}}
            @endif

            @if ($ligne->ComCli != null)
                <br>Commentaire : {{$ligne->ComCli ?? ''}}
            @endif



        </td>
        <td>{{$ligne->Qte ?? ''}}</td>
        <td>{{$ligne->Prix ?? ''}} €</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot style="font-size: 11px">
    <tr>
        <td class="border"></td>
        <td class="border">Total HT</td>
        <td>{{$totalHt ?? ''}} €</td>
    </td>
    </tr>
    <tr>
        <td class="border"></td>
        <td class="border">TVA ({{$devis->tva ?? ''}}%) </td>
        <td>{{$tva ?? ''}} €</td>
    </tr>
    <tr>
        <td class="border"></td>
        <td class="border">Total TTC</td>
        <td>{{$totalTTC ?? ''}} €</td>
    </tr>
    </tfoot>
</table>

<div style="font-size:10px">
    <p style="color: red"><b>Pour valider ce devis :</b></p>
    <p>
        - cliquer sur <a href="http://www.impressiondirect.fr/devisDansCaddie.php?noDev=30768">ce lien</a> qui ajoutera les produits du devis dans le caddie de notre site Internet que vous pourrez modifier avant de valider votre commande.
        <br />
        - nous retourner cet e-mail avec la mention Bon pour accord en complétant les éléments en fin d'e-mail puis en nous indiquant le mode de paiement souhaité
        (CB/chèque/virement/compte client).
        <br/>
        - nous retourner le devis par fax (09 72 11 87 10) en complétant le tableau ci-dessous avec votre numéro professionnel (ex : RCS) ainsi que le mode de paiement
        souhaité
        <br/>
        <br/>
        Vous recevrez un email récapitulatif avec un numéro de commande avec les démarches à suivre selon le choix du paiement.
        <br/>
        Dans tout les cas, veuillez envoyer vos fichiers par e-mail à fichier@impressiondirect.fr ou en les téléchargeant sur notre site Web :
        <a href="http://www.impressiondirect.fr/maquette.php">www.impressiondirect.fr/maquette.php </a>
    </p>
</div>
<div class="center" style="font-size: 10px;">
    <p>
        <br />
        <b>Mode de paiment</b>
        <input type="checkbox" id="cb" name="cb">
        <label for="cb">Carte bancaire</label>
        <input type="checkbox" id="vb" name="vb">
        <label for="vb">Virement bancaire</label>
        <input type="checkbox" id="chèque" name="chèque">
        <label for="chèque">Chèque</label>
        <input type="checkbox" id="cc" name="cc">
        <label for="cc">Compte Client</label>
    </p>
</div>
<div style="font-size: 11px">
    <table class="centerTable">
        <thead>
        <tr>
            <th>CACHET (avec N° RCS)</th>
            <th>Date & signature<br />Précédées de mention "Bon pou accord"</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td height="75" width="200"></td>
            <td height="75" width="200"></td>
        </tr>
    </table>
</div>
<br>
<div style="font-size: 10px">
    <p>
        Nos Prix sont en €HT & livraison gratuite
        <br/>
        Les fichiers sont fournis par le client au format adapté (résolution 300dpi, couleurs enregistrées en CMJN, polices de caractères vectorisées ou fournies).
        <br/>
        Paiement à la commande. Pour toute commande dépassant 1 000 € HT, un acompte de 50 % est demandé à la commande.
        <br/>
        Les tarifs proposés sont valables deux mois.
        <br/>
        Remarque : les devis, dont le montant global est supérieur à 2 000 €, feront l'objet d'une vérification des coûts avant validation d'une commande.
        <br/>
        <br/>
        Sincères salutations, l'équipe d'Impression Direct.
    </p>
</div>

<hr noshade>

<div class='center' style="font-size: 11px">
    <p>
        SARL Impression Direct
        <br>
        RCS 449 225 788 BLOIS - TELEPHONE : 02 51 34 65 30 - FAX - 09 72 11 87 10
    </p>
</div>
</body>

</html>
