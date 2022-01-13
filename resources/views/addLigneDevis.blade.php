@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

<body>
@foreach($devis as $devi)
<h1 class="m-0 text-dark" style="text-align: center">Ajout de ligne pour le devis n°{{$devi->noDevis}}</h1>
@endforeach
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div style="display: flex">
        <form method="POST" action="{{ route('ligneDevis.create')}}">
        @csrf
            <br>

                    <p>

                    <label for="noDevis"> Le devis n° :</label>
                        @foreach($devis as $dligne)
                    <label>{{$dligne->noDevis}}</label>

                        <input type="hidden" name="noDevis" id="noDevis" value="{{$dligne->noDevis}}">
                        @endforeach
                        <label for="nomClient">Référence Client :</label>
                        @foreach($devis as $refClient)
                        <label>{{$refClient->refClient}}</label>
                        @endforeach
                    </p>

            <div style="display: inline-block;text-align: center;vertical-align: middle">
            <p>
                <label for="Produit">Ajout du produit : </label>
                <input type="text" name="Produit" id="Produit" required>
            </p>
            <p>
                <label for="Qte">Quantité : </label>
                <input type="number" name="Qte" id="Qte" required>
            </p>
                <p>
                    <label>Prix Unitaire : </label>
                    <input type="text" name="prixUnit" id="prixUnit" required>
                </p>
            <p>
                <label for="Prix">Prix : </label>
                <input type="text" name="Prix" id="Prix" required>
            </p>
            <p>
                <label style="text-align: center" for="TypePapier">Choix du type papier : </label>
                <input type="text" name="TypePapier" id="TypePapier" required>
            </p>
            </div>
            <div style="display: inline-block;text-align: center;vertical-align: middle">
            <p>
                <label for="dimPapier">Dimension Papier: </label>
                <input type="text" name="DimPapier" id="DimPapier" required>
            </p>
            <p>
                <label for="couleurPapier">Couleur du papier</label>
                <input type="text" name="couleurPapier" id="couleurPapier" required>
            </p>
            <p>
                <label for="ImpRecto">Impression au Recto : </label>
                <input type="text" name="ImpRecto" id="ImpRecto" required>
            </p>
            <p>
                <label for="ImpVerso">Impression au Verso: </label>
                <input type="text" name="ImpVerso" id="ImpVerso" required>
            </p>
            </div>
            <div style="display: inline-block;text-align: right;vertical-align: middle">
            <p>
                <label for="Options">Options : </label>
                <input type="text" name="Options" id="Options" required>
            </p>
            <p>
                <label for="Finitions">Finitions du produit: </label>
                <input type="text" name="Finitions" id="Finitions" required>
            </p>
            <p>
                <label for="SousTraitant">Délai du sous-traitant : </label>
                <input type="text" name="SousTraitant" id="SousTraitant" required>
            </p>
            <p>
                <label for="Supplier">Supplier : </label>
                <input type="text" name="Supplier" id="Supplier" required>
            </p>
            </div>
            <div style="display: inline-block;text-align: right;vertical-align: middle">
                <p>
                    <label for="ComCli">Commentaire Client : </label>
                    <input type="text" name="ComCli" id="ComCli" required>
                </p>
                <p>
                    <label for="ComEnt">Commentaire: </label>
                    <input type="text" name="ComEnt" id="ComEnt" required>
                </p>
                <p>
                    <label for="envoye">Envoie</label>
                    <input type="number" name="envoye" id="envoye" required>
                </p>

            </div>

            <br>
                <button style="border: none" type="submit">
                    <a style="margin-right: auto;border-color: red" class="btn">AJOUTER LA LIGNE</a>
                </button>
        </form>
        <br>
    </div>

</body>
@stop

@section('content')

    @stop
