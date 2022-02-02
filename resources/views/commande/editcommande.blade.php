@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
        <h1 class="m-0 text-dark">Modifier la commande n°{{$commande->noCommande}}</h1><br/>
        <x-buttons.back></x-buttons.back>
@stop

@section('content')
        <form method="POST" action="{{route('commande.update', ['noCommande'=>$commande->noCommande])}}">
            @csrf
            <div class="d-flex">
                <x-form.card title="Information commande" class="w-100">
                    <x-form.input-search temp="{{$commande->refClient}}" label="Référence du client" :datas="$clients->clients" arg="refClient" name="refClient">
                    </x-form.input-search>
                    <x-form.input-search temp="{{$commande->transporteurClient}}" label="Transporteur" :datas="$fournisseurs" arg="appellation" name="transporteurClient">
                    </x-form.input-search>
                    <x-form.textarea label="Produit :" value="Produit.." name="product">{{$commande->produits}}</x-form.textarea>
                    <x-commande.modal></x-commande.modal>
                    <x-form.input label="Date d'expédition" id="" value="{{$commande->dateExpd}}" name="dateExpd" type="date" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Adresse de facturation"></x-form.card-header>
                    <x-form.input label="Nom" id="" value="{{$commande->entCli}}" name="entCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Rue" id="" value="{{$commande->ad1}}" name="ad1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Code Postal" id="" value="{{$commande->ad2}}" name="ad2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Ville" id="" value="{{$commande->ad3}}" name="ad3" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Adresse de Livraison"></x-form.card-header>
                    <x-form.input label="Nom" id="" value="{{$commande->livCli}}" name="livCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Rue" id="" value="{{$commande->livad1}}" name="livAd1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Code Postal" id="" value="{{$commande->livad2}}" name="livAd2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Ville" id="" value="{{$commande->livad3}}" name="livAd3" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Suivi"></x-form.card-header>
                    <x-form.input label="N° Colis" id="" value="{{$commande->noColissimo}}" name="noColissimo" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Lien de suivi" id="" value="{{$commande->adrSuivi}}" name="adrSuivi" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                </x-form.card>
            </div>
            <x-form.card title="Facture/Paiement" class="">
                <x-form.select temp="{{$commande->mpaiement}}" name="moyenPaiement" label="Moyen de Paiement" :datas="['Virement Bancaire','Carte Bancaire','Chèque','PayPal','Prélèvement','Autre']"></x-form.select>
                <x-form.select temp="{{$commande->momentPaiement}}" name="momentPaiement" label="Moment du Paiement" :datas="['Livraison','Commande']"></x-form.select>
                <x-form.card-header title="Options"></x-form.card-header>
                <x-form.select temp="{{$commande->BAT}}" name="BAT" label="BAT" :datas="['NON','OUI']"></x-form.select>
                <x-form.select temp="{{$commande->expertise}}" name="expertiseCommande" label="Expertise" :datas="['NON','OUI']"></x-form.select>
                <x-form.card-header title="Prix"></x-form.card-header>
                <div class="form-group">
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Prix des produits (€)" id="PrixProduits" value="0" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    <x-form.input label="Prix des options (€)" id="PrixOptions" value="0" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    <x-form.input label="Prix du transport (€)" id="PrixTransports" value="{{$commande->pxTransporteur}}" name="pxTransporteur" type="number" step="" oninput="calc()" readonly="" required="" ></x-form.input>
                    </div>
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Réduction (€)" value="{{$commande->reduction}}" id="Reduction" name="reduction" type="number" step="" oninput="calc()" readonly="" required="" ></x-form.input>
                    <x-form.input label="Prix total HT" value="0" id="PrixHT" name="" type="number" step="" oninput="" readonly="readonly" required=""></x-form.input>
                    <x-form.input label="TVA" value="20" id="TVA" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    </div>
                    <div class="w-25">
                    <x-form.input label="Prix TTC" value="{{$commande->pxttc}}" id="PrixTTC" name="pxttc" type="" step="0.01" oninput="" readonly="readonly" required=""></x-form.input>
                    </div>
                    <x-form.input-commission label="Commission de la commande" name="commission_id" :datas="$commissions"></x-form.input-commission>
                </div>
            </x-form.card>
                <button style="border: none" type="submit">
                    <a style="margin-right: auto;border-color: red" class="btn">MODIFIER LA COMMANDE</a>
                </button>
        </form>
    </div>
@stop

@section('js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        let prixProduits = document.getElementById('PrixProduits');
        let prixOptions = document.getElementById('PrixOptions');
        var prixTransports = document.getElementById('PrixTransports');
        var reduction = document.getElementById('Reduction');
        var prixHT = document.getElementById('PrixHT');
        let tva = document.getElementById('TVA');
        let prixTTC = document.getElementById('PrixTTC');
        prixHT.value = (parseInt(prixProduits.value)+parseInt(prixOptions.value)+parseInt(prixTransports.value)-parseInt(reduction.value));
        //tva.value = parseInt(prixHT.value)*20/100;
        let total = parseFloat(prixHT.value);
        prixTTC.value = parseFloat(total)*(1+parseInt(tva.value)/100);
        function calc() {
            prixHT.value = parseInt(total)+parseInt(prixTransports.value)-parseInt(reduction.value)+parseInt(prixProduits.value)+parseInt(prixOptions.value);
            //tva.value = parseFloat(prixHT.value) * 20/100;
            prixTTC.value = (parseInt(prixHT.value)*(1+parseInt(tva.value)/100)).toFixed(2);
        }
    </script>
    <script type="text/javascript">
        function addProduct()
        {
            var Produit = document.getElementById('Produit');
            var Qte = document.getElementById('Qte');
            var DimPapier = document.getElementById('DimPapier');
            var Options = document.getElementById('Options');
            var Prix = document.getElementById('Prix');
            var couleurPapier = document.getElementById('couleurPapier');
            var TypePapier = document.getElementById('TypePapier');
            var Finitions = document.getElementById('Finitions');
            var textarea = document.getElementById('product');
            var msg = document.getElementById('modal-msg');
            let prixProduits = document.getElementById('PrixProduits');

            var values = [Produit.value,TypePapier.value,couleurPapier.value,DimPapier.value,Options.value,Finitions.value,Qte.value,Prix.value]

            if (values[0] != '' && values[1] != '' && values[2] != '' && values[3] != '' && values[4] != '' && values[5] != '' && values[6] != '' && values[7] != '') // si tout les champs sont remplis
            {
                if(textarea.innerHTML.includes("Produit")){ // Si il y a du texte dans le textarea
                    var ligne = '\n'; // on saute une ligne
                }else{
                    var ligne = ''; // sinon rien
                }
                textarea.value += ligne+values[0]+','+values[1]+','+values[3]+','+values[4]+','+values[5]+'; Qte : '+values[6]+'; Prix(HT) :'+values[7]+'\n'; // On ajoute les valeur renseigner dans le textarea
                $('#myModal').modal('hide'); // On ferme le modal
                msg.innerHTML = "";
                prixProduits.value = parseInt(prixProduits.value) + parseInt(values[7]); // on ajoute le prix total des produits (HT)
            }else{
                msg.innerHTML = "Veuillez remplir tous les champs." // si tous les champs ne sont pas rempli
            }
        }
    </script>
@endsection
