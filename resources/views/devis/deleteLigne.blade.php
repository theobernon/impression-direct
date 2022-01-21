@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">{{'Ligne n°'.$ligne->noLigne}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{route('devis.destroyLigne',['noLigne'=>$ligne->noLigne])}}">
            @csrf
            @method("DELETE")
            <!-- Profile Image -->
                <div class="card card-danger card-outline">
                    <div class="card-body">
                        {{__('Confirmer la suppression de la ligne n°')}}{{$ligne->noLigne}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('devis.detailLigne',['noDevis'=>$ligne->noDevis]) }}" class="btn btn-default float-left">{{__('Annuler')}}</a>
                        <input type="submit" class="btn btn-danger float-right" value="{{__('Supprimer')}}">
                    </div>
                </div>
                <!-- /.card -->
            </form>
        </div>
    </div>
@stop
