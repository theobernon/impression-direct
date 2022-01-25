@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <h1 class="m-0 text-dark">Liste des devis</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

 <a style="margin-right: auto;border-color: red" href="devis/form" class="btn">AJOUTER UN DEVIS</a>
<br><br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Liste des devis
        </h3>
        <div class="card-tools">
            <form method="GET" action="{{route('devis.search')}}">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="q" class="form-control float-right" placeholder="Recherche..">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>noDevis</th>
                <th>dateDevis</th>
                <th>refClient</th>
                <th>TVA</th>
                <th>Détails Devis</th>
                <th>Passer Commande</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($devis->devis as $devi)
                <tr>
                    <td>{{$devi->noDevis}}</td>
                    <td>{{$devi->dateDevis}}</td>
                    <td ><a class="text-primary font-weight-bold"  name="dateCommande" href="{{route('client.detail', ['refClient'=>$devi->refClient])}}">{{$devi->refClient}}</a></td>
                    <td>{{$devi->tva}}</td>
                    <td>
                        <form method="GET" id="{{$devi->noDevis}}" action="{{route('devis.detailLigne',['noDevis'=>$devi->noDevis])}}">
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
                    <td>
                        <x-buttons.edit route="{{route('devis.edit', ['noDevis'=>$devi->noDevis])}}"></x-buttons.edit>
                        <x-buttons.delete route="{{route('devis.delete', ['noDevis'=>$devi->noDevis])}}" class=""></x-buttons.delete>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end mr-2">
        {{($pagination->links('pagination::bootstrap-4'))}} {{--Pagination Links--}}
    </div>
</div>
    <br>
@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            order: [[1, "desc"]],
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
