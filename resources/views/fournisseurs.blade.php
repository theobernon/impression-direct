@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Les revendeurs</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

    <p>Ici s'afficherons les revendeurs</p>
    <x-buttons.add route="">Ajouter un revendeur</x-buttons.add>
<br><br>
<div style="overflow-x: auto;">
    <table class="table table-bordered table-striped datatable">
        <thead>
        <tr>
            <th>Référence</th>
            <th>Appellation</th>
            <th>Commentaire</th>
            <th>Prix</th>
            <th>Revendeur</th>
            <th>Numéros Colis</th>
            <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fournisseurs as $fournisseur)
            <tr>
                <td>{{$fournisseur->reference}}</td>
                <td>{{$fournisseur->appellation}}</td>
                <td>{{$fournisseur->commentaire}}</td>
                <td>{{$fournisseur->prix}}</td>
                <td>{{$fournisseur->revendeur}}</td>
                <td>{{$fournisseur->numColis}}</td>
                <td>{{$fournisseur->telephone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            order: [[4, "desc"]],
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
