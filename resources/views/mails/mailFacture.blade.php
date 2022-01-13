@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')

@stop

@section('content')
    <head>
        <link href="{{asset('style.css')}}" rel="stylesheet">
    </head>
    <body>
        <a style="margin-right: auto;border-color: red" href="{{url()->previous()}}" class="btn">RETOUR</a>

    <div>
        <p>{{  $mailFacture['email'] }}</p>
        <p>{{  $mailFacture['prenom'] }}</p>
        <p>{{  $mailFacture['nom'] }}</p>
    </div>
    </body>


@stop
