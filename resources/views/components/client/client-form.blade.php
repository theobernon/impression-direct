<x-form.form method="{{$method}}">
    <!-- Profile Image -->
    <div class="card card-danger card-outline">
        <div class="card-body box-profile">
            <h3 class="text-center">{{$client[0]->nom}} {{$client[0]->prenom}}</h3>
            <hr noshade />
            <h2 class="profile-username text-center">Information Générales</h2>
            <hr noshade />
            <div class="row">
            <div class="col-md-6">
            <x-form.input label="Nom" name="nom" value="{{$client[0]->nom ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Prenom" name="prenom" value="{{$client[0]->prenom ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Référence" name="refClient" value="{{$client[0]->refClient ?? ''}}" readonly="readonly"></x-form.input>
            <x-form.input label="Civilité" name="civilite" value="{{$client[0]->civilite ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Code Tiers" name="codeTiers" value="{{$client[0]->codeTiers ?? ''}}" readonly=""></x-form.input>
            </div>
            <div class="col-md-6">
            <x-form.input label="E-mail" name="email" value="{{$client[0]->email}}" readonly=""></x-form.input>
            <x-form.input label="Société" name="societe" value="{{$client[0]->societe ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Type de client" name="typeClient" value="{{$client[0]->typeClient ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Fonction" name="fonction" value="{{$client[0]->fonction ?? ''}}" readonly=""></x-form.input>
            <x-form.input label="Commercial" name="id_teleprospecteur" value="{{$client[0]->id_teleprospecteur ?? ''}}" readonly=""></x-form.input>
            </div>
            </div>
        </div>
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Coordonnées Téléphoniques</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input label="Téléphone" name="tel" value="{{$client[0]->tel ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Téléphone mobile" name="mobile" value="{{$client[0]->mobile}}" readonly=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input label="Fax" name="fax" value="{{$client[0]->fax ?? ''}}" readonly=""></x-form.input>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
    </div>
</x-form.form>
<x-form.form method="{{$method}}">
<div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Adresse de Facturation</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input label="Rue" name="factAdr1" value="{{$client[0]->factAdr1 ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Code postal" name="factAdr2" value="{{$client[0]->factAdr2 ?? ''}}" readonly=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input label="Ville" name="factAdr3" value="{{$client[0]->factAdr3 ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Pays" name="factPays" value="{{$client[0]->factPays ?? ''}}" readonly=""></x-form.input>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Adresse de Livraison</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input label="Nom" name="livNom" value="{{$client[0]->livNom ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Rue" name="livAdr1" value="{{$client[0]->livAdr1 ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Code postal" name="livAdr2" value="{{$client[0]->livAdr2 ?? ''}}" readonly=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input label="Ville" name="livAdr3" value="{{$client[0]->livAdr3 ?? ''}}" readonly=""></x-form.input>
                    <x-form.input label="Pays" name="livPays" value="{{$client[0]->livPays ?? ''}}" readonly=""></x-form.input>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
</x-form.form>

