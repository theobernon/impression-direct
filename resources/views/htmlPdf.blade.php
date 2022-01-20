<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HTML 2 PDF</title>
    <style type="text/css">
        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
            border: none;
        }

        table th {
            border: 1px solid black;
            padding: 5px;
        }

        table td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        .border {
            border: none;
        }
    </style>
</head>

<body>
    @foreach ($commandes as $commande)
    <div class="left" margin-top="0" margin-bottom="0px">
        <img src="https://procamping85.com/wp-content/uploads/2020/11/Impression-Direct1250pixels.jpg" height="150." width="375">
    </div>

    <div class="right" style="margin: 40px; margin-top: 0px;">
        <div>
            <p>
                <b>Facture n° f486701135662</b>
                <br>Concernant la Commande n°{{$commande->noCommande ?? ''}}
                <br><i>Editée le 03/01/2013</i>
            </p>
            <p>
                {{$commande->entCli ?? ''}}
                <br>{{$commande->ad1 ?? ''}}
                <br>{{$commande->ad2 ?? ''}}
                <br>{{$commande->ad3 ?? ''}}
                <br>tél.: {{$commande->tel ?? ''}}
                <br>fax: {{$commande->client->fax ?? ''}}
            </p>
        </div>
    </div>

    <table>
        <caption><i>Produits</i></caption>
        <thead>
            <tr>
                <th></th>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{$produit}}</td>
                <td>{{$qte}}</td>
                <td>{{$pxht}} €</td>
            </tr>
            {{-- <tr>
        <td>1</td>
        <td>Cartes de visite 400g/m² _ Papier 400 g/m² _ Format
            180x80mm ouvert _ 90x80mm fermé _ Quadrichromie Recto _
            Noir & Blanc Verso _ Options choisies : remise selon
            promotion 10% dec 2012, gaufrage numérique (< 40%), un
            rainage , _ Finition : Non pelliculé</td>
        <td>1250</td>
        <td>381,00 €</td>
    </tr> --}}
            <tr style="height:1.5em">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border">Total HT</td>
                <td>{{$pxht}} €</td>
            </tr>
            <tr>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border">TVA (%) </td>
                <td></td>
            </tr>
            <tr>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"><b>Total TTC</b></td>
                <td><b>{{$commande->pxttc ?? ''}} €</b></td>
            </tr>
            <tr>
                <td class="border"></td>
                <td class="border"></td>
                <td class="border"><b>Reste à payer</b></td>
                <td><b>{{$commande->pxttc ?? ''}} €</b></td>
            </tr>
        </tfoot>
    </table>

    <p>N° TVA : FR19 449 225 788 </p>

    <hr noshade="" />


    @if ($commande->momentPaiement = 'livraison')
    <p>Paiment : à la livraison
    <p>
        @else
    <p>Paiment : à la commande
    <p>
        @endif

        @if ($commande->mpaiement = 'chèque')
    <p>Moyen de paiement : par chèque</p>
    @elseif ($commande->mpaiement = 'carte bancaire')
    <p>Moyen de paiement : par carte bancaire</p>
    @elseif ($commande->mpaiement = 'virement bancaire')
    <p>Moyen de virement : par virement bancaire au
        <br /> BANQUE POPULAIRE ATLANTIQUE
        Banque : 13807 | Guichet : 00843 | N° de compte 30221889548 | Clé RIB 46
        IBAN : FR76 1380 7008 43330 2218 8954 846 | Bank Identifier Code : CCBBPFRPPNAN
    </p>
    @endif

    <small style="font-size:10px"><i>
            Le défaut de paiement d'un effet à son échéance :
            <br>
            - rend immédiatement exigibles toutes les créances de la société même non échues. par ailleurs et conformément à la loi n° 94-1442 du 31.12.94, des intérêts de retard seront calcules sur
            les sommes restant dues à un taux d'intérêt égal à une fois et demie le taux d'intérêt légal.
            <br>
            - Clause pénale : de convention expresse, le défaut de paiement de tout ou partie d'une facture à son échéance entraîne l'application d'une pénalité égale à 20% du montant des sommes dues
            outre intérêts de retard comme indiqué ci-dessus.
            <br>
            - Le montant de l'indemnité forfaitaire pour frais de recouvrement due au créancier en cas de retard de paiement, conformément à l'article 121-II de la loi n°2012-387 du 22 mars 2012.
            <br>
            Cette indemnité est fixé à 40€ par le décret n°2012-1115 du 2 octobre 2012
        </i></small>
    <div class="center" style="font-size:11px;">
        <p>
            ZA la colonne - rue des hirondelles - 85170 Le Poiré sur Vie
            SARL Impressiondirect - www.impressiondirect.fr - contact@impressiondirect.fr
            RCS 449 225 788 BLOIS - Telephone : 02 51 34 65 30 - fax : 09 72 11 87 10
        </p>
    </div>
    @endforeach

</body>

</html>
