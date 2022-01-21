<x-form.form method="{{$method}}" action="{{$action}}">
    <!-- Profile Image -->
    <div class="card card-danger card-outline">
        <div class="card-body box-profile">
            <h3 class="text-center">{{$client[0]->nom ?? ''}} {{$client[0]->prenom ?? ''}}</h3>
            <hr noshade />
            <h2 class="profile-username text-center">Information Générales</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">

                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Nom" name="nomClient" value="{{$client[0]->nom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Prenom" name="prenomClient" value="{{$client[0]->prenom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Référence" name="refClient" value="{{$client[0]->refClient ?? ''}}" readonly="readonly" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Civilité" name="civilite" value="{{$client[0]->civilite ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Code Tiers" name="codeTiers" value="{{$client[0]->codeTiers ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="E-mail" name="emailClient" value="{{$client[0]->email ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Société" name="societeClient" value="{{$client[0]->societe ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Type de client" name="typeClient" value="{{$client[0]->typeClient ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Fonction" name="fonction" value="{{$client[0]->fonction ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Commercial" name="id_teleprospecteur" value="{{$client[0]->id_teleprospecteur ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Coordonnées Téléphoniques</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Téléphone" name="telClient" value="{{$client[0]->tel ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Téléphone mobile" name="mobileClient" value="{{$client[0]->mobile ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Fax" name="faxClient" value="{{$client[0]->fax ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <div class="card-body box-profile">
            <hr noshade />
            <h2 class="profile-username text-center">Adresse de Facturation</h2>
            <hr noshade />
            <div class="row">
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Rue" name="factAdr1" value="{{$client[0]->factAdr1 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Code postal" name="factAdr2" value="{{$client[0]->factAdr2 ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Ville" name="factAdr3" value="{{$client[0]->factAdr3 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Pays" name="factPays" value="{{$client[0]->factPays ?? ''}}" readonly="" required=""></x-form.input>
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
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Nom" name="livNom" value="{{$client[0]->livNom ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Rue" name="livAdr1" value="{{$client[0]->livAdr1 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Code postal" name="livAdr2" value="{{$client[0]->livAdr2 ?? ''}}" readonly="" required=""></x-form.input>
                </div>
                <div class="col-md-6">
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Ville" name="livAdr3" value="{{$client[0]->livAdr3 ?? ''}}" readonly="" required=""></x-form.input>
                    <x-form.input type="" step="" onchange="" oninput="" id="" label="Pays" name="livPays" value="{{$client[0]->livPays ?? ''}}" readonly="" required=""></x-form.input>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <x-form.submit></x-form.submit>
        </div>
    </div>

</x-form.form>

