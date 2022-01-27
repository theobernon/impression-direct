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
<x-commande-client-table :commandes="$commandes->commandes" :pagination="$pagination" action="{{route('commande.clientValider.search')}}"/>


@stop

