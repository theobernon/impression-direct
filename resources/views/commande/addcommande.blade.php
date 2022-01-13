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
                    <x-form.input-search label="Référence du client" :datas="$clients" arg="refClient" name="refClient">
                    </x-form.input-search>
                    <x-form.input-search label="Transporteur" :datas="$fournisseurs" arg="appellation" name="transporteurClient">
                    </x-form.input-search>
                    <x-form.input label="Date d'expédition" value="" name="dateExpd" type="date" step="" onchange=""></x-form.input>
                    <x-form.card-header title="Adresse de facturation"></x-form.card-header>
                    <x-form.input label="Nom" value="" name="entCli" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Rue" value="" name="ad1" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Code Postal" value="" name="ad2" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Ville" value="" name="ad3" type="" step="" onchange=""></x-form.input>
                    <x-form.card-header title="Adresse de Livraison"></x-form.card-header>
                    <x-form.input label="Nom" value="" name="livCli" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Rue" value="" name="livAd1" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Code Postal" value="" name="livAd2" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Ville" value="" name="livAd3" type="" step="" onchange=""></x-form.input>
                    <x-form.card-header title="Suivi"></x-form.card-header>
                    <x-form.input label="N° Colis" value="" name="noColissimo" type="" step="" onchange=""></x-form.input>
                    <x-form.input label="Lien de suivi" value="" name="adrSuivi" type="" step="" onchange=""></x-form.input>
                </x-form.card>
            </div>
            <x-form.card title="Facture/Paiement" class="">
                <x-form.select name="moyenPaiement" label="Moyen de Paiement" :datas="['Virement Bancaire','Carte Bancaire','Chèque','PayPal','Prélèvement','Autre']"></x-form.select>
                <x-form.select name="momentPaiement" label="Moment du Paiement" :datas="['Livraison','Commande']"></x-form.select>
                <x-form.card-header title="Options"></x-form.card-header>
                <x-form.select name="BAT" label="BAT" :datas="['NON','OUI']"></x-form.select>
                <x-form.select name="expertiseCommande" label="Expertise" :datas="['NON','OUI']"></x-form.select>
                <x-form.card-header title="Prix"></x-form.card-header>
                <div class="form-group">
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Prix des produits" value="" name="" type="number" step="" onchange=""></x-form.input>
                    <x-form.input label="Prix des options" value="" name="" type="number" step="" onchange=""></x-form.input>
                    <x-form.input label="Prix du transport" value="" name="" type="number" step="" onchange=""></x-form.input>
                    </div>
                    <div class="d-flex justify-content-between row-cols-4">
                    <x-form.input label="Réduction" value="" name="" type="number" step="" onchange=""></x-form.input>
                    <x-form.input label="Prix total HT" value="" name="" type="number" step="" onchange=""></x-form.input>
                    <x-form.input label="TVA (20%)" value="" name="" type="number" step="" onchange=""></x-form.input>
                    </div>
                    <div class="w-25">
                    <x-form.input label="Prix TTC" value="" name="" type="" step="" onchange=""></x-form.input>
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
        $(function () {
            $('#datetimepicker1').datetimepicker();
        })
    </script>
@endsection
