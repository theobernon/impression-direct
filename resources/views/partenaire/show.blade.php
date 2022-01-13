@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    </head>
    <body>
    @foreach ($clients as $client)
        <h1 style="text-align: center" class="m-0 text-dark">Detail du client n°{{$client->refClient}}</h1>
        <br>
        <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>
        <br>
        <br>

        {{--        <form action="{{ route('client.edit',$client->refClient) }}" method="POST">--}}
        {{--            @csrf--}}
        <table id="customers">
            <tr>
                <th>Informations</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Societe</th>
                <th>Nom de Livraison</th>
                <th>Pays</th>
            </tr>
            <tr>
                <td style="text-align: left;background-color: #ff2525;color: white;">Informations Générales</td>
                <td>{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->societe}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>{{$client->tel}}</td>
                <td>{{$client->mobile}}</td>
                <td>{{$client->fax}}</td>
                <td>{{$client->email}}</td>
                <td></td>
            </tr>
            <tr>
                <td>Adresse de Facturation</td>
                <td>{{$client->factAdr1}}</td>
                <td>{{$client->factAdr2}}</td>
                <td>{{$client->factAdr3}}</td>
                <td></td>
                <td>{{$client->factPays}}</td>
            </tr>
            <tr>
                <td>Adresse de Livraison</td>
                <td>{{$client->livAdr1}}</td>
                <td>{{$client->livAdr2}}</td>
                <td>{{$client->livAdr3}}</td>
                <td>{{$client->livNom}}</td>
                <td>{{$client->livPays}}</td>
            </tr>
            <tr>
                <td>Commercial associé </td>
                <td>
                    @if ($client->id_teleprospecteur === 0)
                        Pas de Commercial associé
                    @elseif ($client->id_teleprospecteur === 1)
                        IORIO Carmelo
                    @elseif ($client->id_teleprospecteur === 2)
                        ROGER Pascal
                    @elseif ($client->id_teleprospecteur === 3)
                        BERNARD Olivier
                    @endif
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Commentaires</td>
                <td style="margin-left: auto">{{$client->remarques}}</td>

            </tr>

        </table>

        <br>

        <a style="border-color: red" href="{{route('client.commande',$client->refClient)}}" class="btn">VOIR SES COMMANDES ET DEVIS</a>
        <br>

        <br>
        <a style="border-color: red" href="{{route('client.edit',['refClient'=>$client->refClient])}}" class="btn">MODIFIER LE CLIENT</a>


    </body>
    @endforeach

@stop

@section('content')

{{--@section('js')--}}
{{--    @parent--}}
{{--    <script>--}}
{{--        $('.datatable').DataTable({--}}
{{--            language: {--}}
{{--                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'--}}
{{--            },--}}
{{--            responsive: true,--}}
{{--            pageLength: 10,--}}
{{--            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

    {{--    <form method="POST" id="{{$client->refClient}}" action="{{route('client.delete',$client->refClient)}}">--}}
    {{--        @csrf--}}
    {{--        <button style="border: none;background: none;" type="submit">--}}
    {{--            <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">--}}
    {{--                <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>--}}
    {{--    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>--}}
    {{--    </svg>--}}
    {{--    </button>--}}
    {{--    </form>--}}
