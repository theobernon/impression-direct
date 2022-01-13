@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des commandes</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

    <p>Ici s'afficherons les commandes où les clients n'ont pas été validées</p>
<br><br>
<x-commande-client-table :commandes="$commandes" />


@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            responsive: true,
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
