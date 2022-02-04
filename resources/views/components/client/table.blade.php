{{--<form.form  method="POST" action="{{$action}}">--}}
<div class="card mb-0">
    <div class="card-header">
        <h3 class="card-title">
            Liste des clients
        </h3>
        <div class="card-tools">
            <form method="GET" action="{{route('client.search')}}">
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
            <th>{{__('Référence')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Nom')}}</th>
            <th>{{__('Prénom')}}</th>
            <th>{{__('Société')}}</th>
            <th>{{__('Téléphone Fixe')}}</th>
            <th>{{__('Téléphone Mobile')}}</th>
            <th>{{__('Fax')}}</th>
            <th>{{__('Détails')}}</th>
            <th>{{__('Supprimer')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients->clients as $client)
            <tr>
                <td>{{$client->refClient}}</td>
                <td>{{$client->email}}</td>
                <td>{{$client->nom}}</td>
                <td>{{$client->prenom}}</td>
                <td>{{$client->societe}}</td>
                <td>{{$client->tel}}</td>
                <td>{{$client->mobile}}</td>
                <td>{{$client->fax}}</td>
                <td>
                    <x-buttons.show id="{{$client->refClient}}" route="{{route('client.detail',$client->refClient)}}"></x-buttons.show>
                </td>
                <td>
                    <x-buttons.delete id="{{$client->refClient}}" class="" route="{{route('client.delete',['refClient'=>$client->refClient])}}"></x-buttons.delete>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br/>
    <div class="d-flex justify-content-end mr-2">
    {{($pagination->links('pagination::bootstrap-4'))}} {{--Pagination Links--}}
    </div>
</div>
{{--</form.form>--}}
