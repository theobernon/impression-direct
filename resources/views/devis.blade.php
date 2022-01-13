@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Liste des devis</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

 <a style="margin-right: auto;border-color: red" href="devis/form" class="btn">AJOUTER UN DEVIS</a>
<br><br>
<div style="overflow-x: auto">
        <table class="fl-table">
            <thead>
            <tr>
                <th>noDevis</th>
                <th>dateDevis</th>
                <th>refClient</th>
                <th>TVA</th>
                <th>Détails Devis</th>
                <th>Passer Commande</th>


            </tr>
            </thead>
            <tbody>
            @foreach ($devis as $devi)
                <tr>
                    <td>{{$devi->noDevis}}</td>
                    <td>{{$devi->dateDevis}}</td>
                    <td><a style="border: none; color: black ;background: none; text-align: center" name="dateCommande" href="{{route('client.detail', $devi->refClient)}}">{{$devi->refClient}}</a></td>
                    <td>{{$devi->tva}}</td>
                    <td>
                        <form method="GET" id="{{$devi->noDevis}}" action="{{route('devis.detailLigne',$devi->noDevis)}}">
                            @csrf
                            <button style="border: none;background: none;" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                        </form>
                    </td>


                    <td>
                        <form method="GET" id="[{{$devi->noDevis}},{{$devi->refClient}}]" action="{{route('devis.commande.create',[$devi->noDevis,$devi->refClient])}}">
                            <button style="border: none;background: none;" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                                    <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
@stop
