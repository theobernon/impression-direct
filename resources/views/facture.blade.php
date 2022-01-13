
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/adminlte/dist/css/adminlte.css')}}" rel="stylesheet">
</head>
<body>
        <div class="container">
            <div class="row">
                <!-- BEGIN INVOICE -->
                <div class="col-xs-12">
                    <div class="grid invoice">
                        <div class="grid-body">
                            <div class="invoice-title">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <img src="{{ asset('LOGO_IMPRESSION_DIRECT.png') }}" alt="" height="150">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div style="text-align: right" class="col-xs-12">
                                        <h2>
                                            <strong><span style="font-size: 14px">Facture n°{{rtrim($commande->nomPdf,'.pdf')}}</span></strong><br>
                                            <span style="font-size: 12px">Concernant la commande n°{{$commande->noCommande}}</span><br>
                                            <span style="font-size: 12px" class="small">Créer le {{date('Y-m-d')}}</span></h2>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">

                                <div style="margin-left: auto" class="col-xs-6">
                                    <address>
                                        <strong>Adresse de facturation :</strong><br>
                                        {{$commande->ad1}}<br>
                                        {{$commande->ad2}} {{$commande->ad3}}<br>

                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>ORDER SUMMARY</h3>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="line">
                                            <td><strong>#</strong></td>
                                            <td class="text-center"><strong>PRODUITS</strong></td>
                                            <td class="text-center"><strong>QUANTITE</strong></td>
                                            <td class="text-right"><strong>PRIX UNITAIRE</strong></td>
                                            <td class="text-right"><strong>PRIX TOTAL</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($lignes != null)

                                            @foreach ($lignes as $ligne)
                                                {{$compteur = 0}}
                                            <tr>
                                                <td>{{$compteur++}}</td>
                                                <td>{{$ligne->Produit}}</td>
                                                <td class="text-center">{{$ligne->prixUnit}}</td>
                                                <td class="text-center">{{$ligne->Prix}}</td>
                                                <td class="text-right">1,125.00 €</td>
                                            </tr>
                                            @endforeach
                                        @endif
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>TOTAL HT</strong></td>
                                            <td class="text-right"><strong>{{$commande->pxttc}}/1,(TVA) €</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                            </td><td class="text-right"><strong>TVA (TVA)</strong></td>
                                            <td class="text-right"><strong>{{$commande->pxttc}}/1,TVA*0,TVA €</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>TOTAL TTC</strong></td>
                                            <td class="text-right"><strong>{{$commande->pxttc}} €</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="text-right"><strong>Reste à payer</strong></td>
                                            <td class="text-right"><strong>{{$commande->pxttc}} €</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col-md-12 identity">
                                    <p>N° TVA : FR19 449 225 788<br></p>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <a><strong>Paiement :</strong></a>
                                <a style="text-align: center">À la livraison</a><br>
                                <a><strong>Moyen de Paiement :</strong>Par {{$commande->mpaiement}} au :</a><br><br>
                                <p><strong>BANQUE POPULAIRE ATLANTIQUE</strong></p>
                                <p><strong>Banque : 13807 | Guichet : 00843 | N° de compte 30221889548 | Clé RIB 46</strong></p>
                                <p><strong>IBAN : FR76 1380 7008 4330 2218 8954 846 | Bank Identifier Code : CCBPFRPPNAN</strong></p>
                            </div>
                            <div class="row">
                                <div style="font-size: 12px" class="text-left col-md-12 identity">

                                    <p>Le défaut de paiement d'un effet à son échéance :</p>
                                    <p>- rend immédiatement exigibles toutes les créances de la société même non échues. par ailleurs et conformément à la loi n°94-1442 du 31.12.94, des intérêts de retard
                                    seront calcules sur les sommes restant dues à un taux d'intérêt égal à une fois et demie le taux d'intérêt légal.</p>
                                    <p>- Clause pénale : de convention expresse, le défaut de paiement de tout ou partie d'une facture à son échéance entraîne l'application d'une pénalité égale à 20% du montant
                                    des sommes dues outre intérêts de retard comme indiqué ci-dessus.</p>
                                    <p>- Le montant de l'indemnité forfaitaire pour frais de recouvrement due au créancier en cas de retard de paiement, conformément à l'article 121-II de la loi n°2012-387 du 22 mars 2012.</p>
                                    <p>Cette indemnité est fixée à 40€ par le décret n°2012-1115 du 2 octobre 2012.</p>


                                </div>
                            </div>
                            <div class="row">
                                <div class="text-center col-md-12 identity">
                                    <strong>Zone Beaupuy 1 - 137 Rue du clair Bocage - 85000 MOUILLERON LE CAPTIF -</strong>
                                    <strong>SARL Impressiondirect - www.impressiondirect.fr - contact@impressiondirect.fr -</strong>
                                    <strong>RCS 449 225 788 BLOIS - CODE NAF : 1812Z - Telephone : 02 51 34 65 30</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END INVOICE -->
            </div>
        </div>
</body>
