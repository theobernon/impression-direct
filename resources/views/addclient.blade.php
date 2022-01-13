@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

<body>
<a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
<div style="display: flex">
    <form method="POST" action="{{ route('client.create')}}">
    @csrf
            <div style="display: inline-block;text-align: left;vertical-align: middle">
                <p style="text-align: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                        <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
                    </svg>
                </p>
                <p>
                <label for="emailClient">Entrez l'email du client :</label>
                <input type="text" name="emailClient" id="emailClient">
                </p>
                <p>
                <label for="nomClient">Entrez le nom du client :</label>
                <input type="text" name="nomClient" id="nomClient">
                </p>
                <p>
                <label for="prenomClient">Entrez le prenom du client :</label>
                <input type="text" name="prenomClient" id="prenomClient">
                </p>
                <p>
                <label for="societeClient">Entrez la societe du client :</label>
                <input type="text" name="societeClient" id="societeClient">
                </p>
            </div>
            <div style="text-align: right;  display: inline-block;vertical-align: middle">
                <p style="text-align: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                </p>
                <p>
                <label for="telClient">Entrez le téléphone du client :</label>
                <input type="text" name="telClient" id="telClient">
                </p>
                <p>
                <label for="mobileClient">Entrez le mobile du client :</label>
                <input type="text" name="mobileClient" id="mobileClient">
                </p>
                <p>
                <label for="faxClient">Entrez le FAX du client :</label>
                <input type="text" name="faxClient" id="faxClient">
                </p>
            </div>
            <div style="display: inline-block;text-align: left;vertical-align: middle">
                <p style="text-align: center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </p>
                <p>
                <label for="factAdr1">Entrez l'adresse de facturation du client :</label>
                <input type="text" name="factAdr1" id="factAdr1">
                </p>
                <p>
                <label for="factAdr2">Entrez le Code Postal de facturation du client :</label>
                <input type="text" name="factAdr2" id="factAdr2">
                </p>
                <p>
                <label for="factAdr3">Entrez la Région/Ville/Département de facturation du client :</label>
                <input type="text" name="factAdr3" id="factAdr3">
                </p>
                <p>
                <label for="factPays">Entrez le pays de facturation du client</label>
                <select name="factPays" >
                @foreach($pays as $country)
                    <option value="{{$country->id_pays}}}" >{{$country->nom_pays}}</option>
                @endforeach
                </select>
                </p>
                <p>
                <label for="livAdr1">Entrez l'adresse de livraison du client :</label>
                <input type="text" name="livAdr1" id="livAdr1">
                </p>
                <p>
                <label for="livAdr2">Entrez le code postal de livraison du client :</label>
                <input type="text" name="livAdr2" id="livAdr2">
                </p>
                <p>
                <label for="livAdr3">Entrez la Région/Ville/Département de livraison du client :</label>
                <input type="text" name="livAdr3" id="livAdr3">
                </p>
                <p>
                    <label for="livPays">Entrez le pays de livraison du client</label>
                    <select name="livPays" >
                        @foreach($pays as $country)
                            <option value="{{$country->id_pays}}}" >{{$country->nom_pays}}</option>
                        @endforeach
                    </select>
                </p>
                <p>
            </div>
            <div>
                <a>
                <label for="remarques">Ajouter un commentaire sur le client :</label>
                    <textarea type="text" name="remarques" id="remarques">

                    </textarea>
                </a>
            </div>

            <div>
                <a>
                <label for="id_tele">Séléctionner le commercial associé au client :</label>
                <select name="id_teleprospecteur">
                     @foreach ($teleprospecteur as $tele)
                        <option value="{{$tele->num}}">{{$tele->nom}}</option>
                     @endforeach
                </select>
                </a>
            </div>
<br>
            <button style="border: none" type="submit">
                <a style="margin-right: auto;border-color: red" class="btn">AJOUTER LE CLIENT</a>
            </button>

    </form>
</div>
    <br>


</body>
@stop

@section('content')
