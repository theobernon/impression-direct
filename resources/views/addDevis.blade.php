@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

<body>
    <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
    <div style="display: flex">
        <form method="POST" action="{{ route('devis.create')}}">
        @csrf
            <br>
                    <p>
                    <label>Entrez la date du devis :</label>
                        <input type="date" name="dateDevis" id="dateDevis" value="{{date('Y-m-d')}}" onFocus="this.value='';">
                    </p>
                <br>
                    <p>
                        <label for="nomClient">Entrez la référence client :</label>
                        <input type="text" name="refClient" id="refClient" value="" required>
                    </p>
            <p>
                <label for="nomClient">Entrez la TVA :</label>
                <input type="text" name="tva" id="tva" list="tvaListe" required>
                <datalist id="tvaListe">
                    <option>20</option>
                    <option>10</option>
                    <option>5,5</option>
                    <option>2,1</option>
                    <option>0</option>
                </datalist>
            </p>
            <br>
                <button style="border: none" type="submit">
                    <a style="margin-right: auto;border-color: red" class="btn">AJOUTER LE DEVIS</a>
                </button>
        </form>
        <br>
    </div>

</body>
@stop

@section('content')
