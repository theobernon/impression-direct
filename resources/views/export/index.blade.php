@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <h1 class="m-0 text-dark">Export Compta</h1>
@stop

@section('content')
<head>
    <link href="{{asset('style.css')}}" rel="stylesheet">
</head>

    <p>Ici vous pourrez exporter des données en CSV</p>
<x-form.form action="{{route('export.send')}}">
    <x-form.card title="Export Compta" class="">
        <x-form.group value="" label="Date de début" type="date" id="dateDebut" required="required"></x-form.group>
        <x-form.group value="" label="Date de fin" type="date" id="dateFin" required=""></x-form.group>
        <div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-file-export"> Exporter</i>
        </button>
        </div>
    </x-form.card>
</x-form.form>

@stop

@section('js')
    @parent
    <script>
        $('.datatable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.11.1/i18n/fr_fr.json'
            },
            responsive: true,
            pageLength: 10,
            lengthMenu: [[10, 25, -1], [10, 25, "Tout"]]
        });
    </script>
@endsection
