@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <link href="{{asset('style.css')}}" rel="stylesheet">
    <h1 class="m-0 text-dark" style="text-align: center">Ajout de ligne pour le devis n°{{$devis->noDevis}}</h1>
@stop

@section('content')
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div style="display: flex">
        <form method="POST" action="{{ route('ligneDevis.create')}}">
        @csrf
            <x-form.group :value="$devis->noDevis" label="" type="hidden" id="noDevis" required=""></x-form.group>
            <x-form.card title="Le devis n°{{$devis->noDevis}} Référence Client : {{$devis->refClient}}" class="mt-4">
                <row class="col-sm-10 row">
                <x-form.group value="" label="Produit" type="" id="Produit" required="required"></x-form.group>
                <x-form.group value="" label="Quantité" type="number" id="Qte" required="required"></x-form.group>
                <x-form.group value="" label="Dimension papier" type="" id="DimPapier" required="required"></x-form.group>
                <x-form.group value="" label="Options" type="" id="Options" required="required"></x-form.group>
                <x-form.group value="" label="Prix Unitaire" type="number" id="prixUnit" required="required"></x-form.group>
                <x-form.group value="" label="Prix" type="number" id="Prix" required="required"></x-form.group>
                <x-form.group value="" label="Couleur du papier" type="" id="couleurPapier" required="required"></x-form.group>
                <x-form.group value="" label="Finitions du papier" type="" id="Finitions" required="required"></x-form.group>
                <x-form.group value="" label="Impression au Recto" type="" id="ImpRecto" required="required"></x-form.group>
                <x-form.group value="" label="Impression au Verso" type="" id="ImpVerso" required="required"></x-form.group>
                <x-form.group value="" label="Delai du sous-traitant" type="" id="SousTraitant" required="required"></x-form.group>
                <x-form.group value="" label="Supplier" type="" id="Supplier" required="required"></x-form.group>
                <x-form.group value="" label="Choix du type papier" type="" id="TypePapier" required="required"></x-form.group>
                    <div class="form-group">
                        <label>Envoyé</label>
                        <select class="form-control" name="envoye">
                                <option value="0" selected>NON</option>
                                <option value="1">OUI</option>
                        </select>
                    </div>
                    <x-form.textarea label="Commentaire" value="" name="ComEnt"></x-form.textarea>
                    <x-form.textarea label="Commentaire Client" value="" name="ComCli"></x-form.textarea>
                </row>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger float-right">Ajouter la ligne</button>
                </div>
            </x-form.card>

        </form>
        <br>
    </div>

</body>
@stop
