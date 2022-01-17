@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
        <h1 class="m-0 text-dark">Nouvelle commande</h1><br/>
        <x-buttons.back></x-buttons.back>
@stop

@section('content')
        <form method="POST" action="{{ route('commande.create')}}">
            @csrf
            <div class="d-flex">
                <x-form.card title="Information commande" class="w-100">
                    <x-form.input-search temp="" label="Référence du client" :datas="$clients" arg="refClient" name="refClient">
                    </x-form.input-search>
                    <x-form.input-search temp="" label="Transporteur" :datas="$fournisseurs" arg="appellation" name="transporteurClient">
                    </x-form.input-search>
                    <x-form.textarea label="Produit :" value="Produit.." name="product"></x-form.textarea>
                    <x-form.input label="Date d'expédition" id="" value="" name="dateExpd" type="date" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Adresse de facturation"></x-form.card-header>
                    <x-form.input label="Nom" id="" value="" name="entCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Rue" id="" value="" name="ad1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Code Postal" id="" value="" name="ad2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Ville" id="" value="" name="ad3" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Adresse de Livraison"></x-form.card-header>
                    <x-form.input label="Nom" id="" value="" name="livCli" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Rue" id="" value="" name="livAd1" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Code Postal" id="" value="" name="livAd2" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Ville" id="" value="" name="livAd3" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.card-header title="Suivi"></x-form.card-header>
                    <x-form.input label="N° Colis" id="" value="" name="noColissimo" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                    <x-form.input label="Lien de suivi" id="" value="" name="adrSuivi" type="" step="" oninput="" readonly="" required="" ></x-form.input>
                </x-form.card>
            </div>
            <x-form.card title="Facture/Paiement" class="">
                <x-form.select temp="" name="moyenPaiement" label="Moyen de Paiement" :datas="['Virement Bancaire','Carte Bancaire','Chèque','PayPal','Prélèvement','Autre']"></x-form.select>
                <x-form.select temp="" name="momentPaiement" label="Moment du Paiement" :datas="['Livraison','Commande']"></x-form.select>
                <x-form.card-header title="Options"></x-form.card-header>
                <x-form.select temp="" name="BAT" label="BAT" :datas="['NON','OUI']"></x-form.select>
                <x-form.select temp="" name="expertise" label="Expertise" :datas="['NON','OUI']"></x-form.select>
                <x-form.card-header title="Prix"></x-form.card-header>
                <div class="form-group">
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Prix des produits (€)" id="PrixProduits" value="0" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    <x-form.input label="Prix des options (€)" id="PrixOptions" value="0" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    <x-form.input label="Prix du transport (€)" id="PrixTransports" value="0" name="pxTransporteur" type="number" step="" oninput="calc()" readonly="" required="" ></x-form.input>
                    </div>
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Réduction (€)" value="0" id="Reduction" name="reduction" type="number" step="" oninput="calc()" readonly="" required="" ></x-form.input>
                    <x-form.input label="Prix total HT" value="0" id="PrixHT" name="" type="number" step="" oninput="" readonly="readonly" required=""></x-form.input>
                    <x-form.input label="TVA" value="20" id="TVA" name="" type="number" step="" oninput="calc()" readonly="" required=""></x-form.input>
                    </div>
                    <div class="w-25">
                    <x-form.input label="Prix TTC" value="0" id="PrixTTC" name="pxttc" type="" step="0.01" oninput="" readonly="readonly" required=""></x-form.input>
                    </div>
                    <x-form.input-commission label="Commission de la commande" name="commission_id" :datas="$commissions"></x-form.input-commission>
                </div>
            </x-form.card>
                <button style="border: none" type="submit">
                    <a style="margin-right: auto;border-color: red" class="btn">AJOUTER LA COMMANDE</a>
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
        prixHT.value = (parseInt(prixProduits.value)+parseInt(prixOptions.value)+parseInt(prixTransports.value)+parseInt(reduction.value));
        //tva.value = parseInt(prixHT.value)*20/100;
        let total = parseFloat(prixHT.value);
        prixTTC.value = parseFloat(total)*(1+parseInt(tva.value)/100);
        function calc() {
            prixHT.value = parseInt(total)+parseInt(prixTransports.value)+parseInt(reduction.value)+parseInt(prixProduits.value)+parseInt(prixOptions.value);
            //tva.value = parseFloat(prixHT.value) * 20/100;
            prixTTC.value = (parseInt(prixHT.value)*(1+parseInt(tva.value)/100)).toFixed(2);
        }
    </script>
@endsection
