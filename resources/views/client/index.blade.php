@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des clients</h1>
    <x-buttons.create route="{{route('client.ajouter')}}"></x-buttons.create>

@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>
    <br><br>
    <x-client.table :clients="$clients" ></x-client.table>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            order: [[1, "desc"]],
            responsive: true,
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection

{{--    <a style="margin-right: auto;border-color: red" href="/client/formulaire/" class="btn">AJOUTER UN CLIENT</a>--}}

{{--    <br><br>--}}
{{--    <div style="overflow-x: auto;">--}}
{{--        <table class="fl-table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Référence du client</th>--}}
{{--                <th>Email</th>--}}
{{--                <th>Nom</th>--}}
{{--                <th>Prénom</th>--}}
{{--                <th>Société</th>--}}
{{--                <th>Téléphone</th>--}}
{{--                <th>Mobile</th>--}}
{{--                <th>Fax</th>--}}
{{--                <th>Détail</th>--}}
{{--                <th>Supprimer</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach ($clients as $client)--}}
{{--                <tr>--}}
{{--                    <td>{{$client->refClient}}</td>--}}
{{--                    <td>{{$client->email}}</td>--}}
{{--                    <td>{{$client->nom}}</td>--}}
{{--                    <td>{{$client->prenom}}</td>--}}
{{--                    <td>{{$client->societe}}</td>--}}
{{--                    <td>{{$client->tel}}</td>--}}
{{--                    <td>{{$client->mobile}}</td>--}}
{{--                    <td>{{$client->fax}}</td>--}}
{{--                <!--<td>{{$client->factAdr1}}{{$client->factAdr2}}{{$client->factAdr3}}</td>--}}
{{--                <td>{{$client->livAdr1}}{{$client->livAdr2}}{{$client->livAdr3}}</td>-->--}}
{{--                    <td>--}}
{{--                        <form method="GET" id="{{$client->refClient}}" action="{{route('client.detail',$client->refClient)}}">--}}
{{--                            @csrf--}}
{{--                            <button style="border: none;background: none;" type="submit">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">--}}
{{--                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>--}}
{{--                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <form method="POST" id="{{$client->refClient}}" action="{{route('client.delete',$client->refClient)}}">--}}
{{--                            @csrf--}}
{{--                            <button style="border: none;background: none;" type="submit">--}}
{{--                                <svg style="color: red" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-octagon" viewBox="0 0 16 16">--}}
{{--                                    <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1L1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>--}}
{{--                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
{{--    <br>--}}


{{--@stop--}}
