@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des commandes</h1>
@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>

    <p>Ici s'afficherons les commandes qui n'ont pas été expediées</p>
    <br><br>
    <x-commande-table :commandes="$commandes->commandes" action="{{route('commande.commandeAExpedier.search')}}" :pagination="$pagination"/>
@stop
