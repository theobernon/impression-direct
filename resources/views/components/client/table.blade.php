{{--<form.form  method="POST" action="{{$action}}">--}}
    <table class="table table-bordered table-striped datatable" >
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
        @foreach($clients as $client)
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
                    <x-buttons.delete id="{{$client->refClient}}" class="" route="{{route('client.delete',$client->refClient)}}"></x-buttons.delete>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--</form.form>--}}
