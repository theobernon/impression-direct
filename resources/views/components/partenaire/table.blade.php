<table class="table table-bordered table-striped datatable">
    <thead>
    <tr>
        <th>{{__('Num')}}</th>
        <th>{{__('Nom')}}</th>
        <th>{{__('Prénom')}}</th>
        <th>{{__('Entreprise')}}</th>
        <th>{{__('Email')}}</th>
        <th>{{__('Téléphone')}}</th>
        <th>{{__('Commission')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($partenaires as $partenaire)
        <tr>
            <td>{{$partenaire->num}}</td>
            <td>{{$partenaire->nom}}</td>
            <td>{{$partenaire->prenom}}</td>
            <td>{{$partenaire->numEntreprise}}</td>
            <td>{{$partenaire->email}}</td>
            <td>{{$partenaire->tel}}</td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
