@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des partenaires
        <a href="{{route('partenaire.create')}}" class="btn btn-danger float-right">
            <i class="fa fa-plus"></i>
            {{__('Ajouter un partenaires')}}
        </a>

    </h1>
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>
    <br><br>
    <x-partenaire.table :partenaires="$partenaires" ></x-partenaire.table>
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
