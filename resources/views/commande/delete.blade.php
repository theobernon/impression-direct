@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">{{'Commande n°'.$commande->noCommande}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{route('commande.destroy',['noCommande'=>$commande->noCommande])}}">
            @csrf
            @method("DELETE")
            <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        {{__('Confirmer la suppression de la commande n°')}}{{$commande->noCommande}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('commande.index') }}" class="btn btn-default float-left">{{__('Annuler')}}</a>
                        <input type="submit" class="btn btn-danger float-right" value="{{__('Supprimer')}}">
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
@stop
