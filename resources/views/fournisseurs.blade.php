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
    <button class="button1"> Ajouter un revendeur</button>
<br><br>
<div style="overflow-x: auto;">
    <table class="fl-table">
        <thead>
        <tr>
            <th>reference</th>
            <th>appelation</th>
            <th>prix</th>
            <th>revendeur</th>
            <th>numColis</th>
            <th>Téléphone</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($fournisseurs as $fournisseur)
            <tr>
                <td>{{$fournisseur->reference}}</td>
                <td>{{$fournisseur->appellation}}</td>
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
