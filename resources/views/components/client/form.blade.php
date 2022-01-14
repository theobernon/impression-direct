<x-form.form method="{{$method}}" action="{{$action}}">
    <!-- Profile Image -->
    <div class="card card-danger card-outline">
        <div class="card-body box-profile">
            <h3 class="text-center">{{$client->nom ?? ''}} {{$client->prenom ?? ''}}</h3>
            <hr noshade />
            <h2 class="profile-username text-center">Information Générales</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Nom" name="nomClient" value="{{$client->nom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Prenom" name="prenomClient" value="{{$client->prenom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Référence" name="refClient" value="{{$client->refClient ?? ''}}" readonly="readonly" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Civilité" name="civilite" value="{{$client->civilite ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Code Tiers" name="codeTiers" value="{{$client->codeTiers ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="E-mail" name="emailClient" value="{{$client->email ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Société" name="societeClient" value="{{$client->societe ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Type de client" name="typeClient" value="{{$client->typeClient ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Fonction" name="fonction" value="{{$client->fonction ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Commercial" name="id_teleprospecteur" value="{{$client->id_teleprospecteur ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Coordonnées Téléphoniques</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Téléphone" name="telClient" value="{{$client->tel ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Téléphone mobile" name="mobileClient" value="{{$client->mobile ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Fax" name="faxClient" value="{{$client->fax ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Adresse de Facturation</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Rue" name="factAdr1" value="{{$client->factAdr1 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Code postal" name="factAdr2" value="{{$client->factAdr2 ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Ville" name="factAdr3" value="{{$client->factAdr3 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Pays" name="factPays" value="{{$client->factPays ?? ''}}" readonly="" required=""></x-form.input>
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
                    <x-form.input type="" step="" onchange="" label="Nom" name="livNom" value="{{$client->livNom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Rue" name="livAdr1" value="{{$client->livAdr1 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Code postal" name="livAdr2" value="{{$client->livAdr2 ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" label="Ville" name="livAdr3" value="{{$client->livAdr3 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" label="Pays" name="livPays" value="{{$client->livPays ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
    </div>

</x-form.form>

