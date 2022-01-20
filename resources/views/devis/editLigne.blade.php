@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

<body>
<h1 class="m-0 text-dark" style="text-align: center">Modification de la ligne n°{{$ligne->noLigne}} pour le devis n°{{$ligne->noDevis}}</h1>
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div style="display: flex">
        <form method="POST" action="{{ route('devis.updateLigne',['noLigne'=>$ligne->noLigne])}}">
        @csrf
            <x-form.group value="{{$ligne->noDevis}}" label="" type="hidden" id="noDevis" required=""></x-form.group>
            <x-form.card title="Le devis n°{{$ligne->noDevis}} Référence Client : {{$ligne->devis->refClient}}" class="mt-4">
                <div class="col-sm-12 row">
                <x-form.group value="{{$ligne->Produit}}" label="Produit" type="" id="Produit" required="required"></x-form.group>
                <x-form.group value="{{$ligne->Qte}}" label="Quantité" type="number" id="Qte" required="required"></x-form.group>
                <x-form.group value="{{$ligne->DimPapier}}" label="Dimension papier" type="" id="DimPapier" required="required"></x-form.group>
                <x-form.group value="{{$ligne->Options}}" label="Options" type="" id="Options" required="required"></x-form.group>
                <x-form.group value="{{$ligne->prixUnit}}" label="Prix Unitaire" type="" id="prixUnit" required="required"></x-form.group>
                <x-form.group value="{{$ligne->Prix}}" label="Prix" type="" id="Prix" required="required"></x-form.group>
                <x-form.group value="{{$ligne->couleurPapier}}" label="Couleur du papier" type="" id="couleurPapier" required="required"></x-form.group>
                <x-form.group value="{{$ligne->Finitions}}" label="Finitions du papier" type="" id="Finitions" required="required"></x-form.group>
                <x-form.group value="{{$ligne->ImpRecto}}" label="Impression au Recto" type="" id="ImpRecto" required="required"></x-form.group>
                <x-form.group value="{{$ligne->ImpVerso}}" label="Impression au Verso" type="" id="ImpVerso" required="required"></x-form.group>
                <x-form.group value="{{$ligne->SousTraitant}}" label="Delai du sous-traitant" type="" id="SousTraitant" required="required"></x-form.group>
                <x-form.group value="{{$ligne->Supplier}}" label="Supplier" type="" id="Supplier" required="required"></x-form.group>
                <x-form.group value="{{$ligne->TypePapier}}" label="Choix du type papier" type="" id="TypePapier" required="required"></x-form.group>
                    <div class="form-group">
                        <label>Envoyé</label>
                        <select class="form-control" name="envoye">
                            @if($ligne->Envoye == 0)
                                <option value="0" {{'selected'}}>NON</option>
                                <option value="1">OUI</option>
                            @else
                                <option value="0">NON</option>
                                <option value="1" {{'selected'}}>OUI</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <x-form.textarea label="Commentaire" value="Commentaire" name="ComEnt">{{$ligne->ComEnt}}</x-form.textarea>
                    <x-form.textarea label="Commentaire Client" value="Commentaire Client" name="ComCli">{{$ligne->ComCli}}</x-form.textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-danger float-right">Modifier la ligne</button>
                </div>
            </x-form.card>

        </form>
        <br>
    </div>

</body>
@stop
