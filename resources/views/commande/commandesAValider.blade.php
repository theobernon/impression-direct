@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des commandes à valider</h1>
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>

    <p>Ici s'afficherons les commandes qui n'ont pas été validées</p>
    <br><br>
    <x-commande-table :commandes="$commandes->commandes" action="{{route('commande.commandeAValidee.search')}}" :pagination="$pagination" />
@stop

