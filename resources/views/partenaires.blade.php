@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Les partenaires</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

    <p>Ici s'afficherons la liste des partenaires/commerciaux</p>
    <button class="button1">Ajouter un partenaire</button>
<br><br>
<div style="overflow-x: auto;">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Num</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>NomEntreprise</th>
            <th>email</th>
            <th>tel</th>
            <th>commission</th>
        </tr>
        </thead>
        <tbody>
        @foreach($partenaires as $partenaire)
            <tr>
                <td>{{$partenaire->num}}</td>
                <td>{{$partenaire->nom}}</td>
                <td>{{$partenaire->prenom}}</td>
                <td>{{$partenaire->numEntreprise}}</td>
                <td>{{$partenaire->email}}</td>
                <td>{{$partenaire->tel}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@stop
