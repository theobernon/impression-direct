@extends('adminlte::page')

@section('title', env('APP_NAME'))

@section('content_header')
{{--    <h1 class="m-0 text-dark">{{$clients['nom']}}}</h1>--}}
@stop

@section('content')
            <x-client.clientform :client="$client"></x-client.clientform>
@stop

