@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    @include('flash-message')
    <h1 class="m-0 text-dark">Gestion des mails</h1>
    <p class="m-0 text-dark">Page de contact permettant l'envoie de mails</p>
@stop

@section('content')
    <x-form.card title="Envoi mail" class="">
        <x-form.form action="{{route('mail.send')}}">
            <x-form.group value="" label="Destinataire" type="" id="destinataire" required="required"></x-form.group>
            <div class="form-group col-sm-6">
                <label>Choix de l'expéditeur</label>
                <select class="form-control" name="expediteur" required>
                    @foreach($email as $em)
                        <option value="{{$em[0]}}">{{$em[1]}}</option>
                    @endforeach
                </select>
            </div>
            <x-form.group value="" label="Expediteur" type="" id="expediteur2" required=""></x-form.group>
            <x-form.group value="" label="Sujet" type="" id="sujet" required=""></x-form.group>
            <x-form.textarea label="Votre message" value="" name="message"></x-form.textarea>
            <a href="#" onclick="supprimer() ; return(false)">Réinitialiser</a>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Insertion automatique de formules :</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Bonjour</th>
                                <th>Texte</th>
                                <th>Formules</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#" onclick="addText('Bonjour Monsieur,\n\n');return(false)">Monsieur</a></td>
                                <td><a href="#" onclick="addText('Bonjour Monsieur ,\n\n Je vous remercie pour cette nouvelle commande,\n\nVous allez recevoir un email récapitulatif avec un numéro de commande.\n\nRemarque:\nVous n’avez qu’à suivre les indications en rouge pour valider l’email (&quot;Bon de commande&quot;) puisque vous avez déjà validé le devis.\n-------------------------------\n');return(false)">Nouvelle commande</a></td>
                                <td><a href="#" onclick="addText('Sincères salutations, Guillaume CHAUDET\n\nImpression Direct\nZA la colonne - rue des hirondelles\n85170 LE POIRE SUR VIE\nTél.: 02 51 34 65 30\nFax :  0 821 488 050 / 02 51 34 65 30\ng.chaudet@impressiondirect.fr\nhttp://www.impressiondirect.fr\n\n-------------------------------\n');return(false)">Guillaume Chaudet</a></td>
                            </tr>
                            <tr>
                                <td><a href="#" onclick="addText('Bonjour Madame,\n\n');return(false)">Madame</a></td>
                                <td><a href="#" onclick="addText('Merci de cliquer sur le lien ci-dessous ou copier le dans la barre d’adresses de votre navigateur Internet pour afficher la page de paiement.\nhttp://www.impressiondirect.fr/payonline.php?num_cde=55042&amp;name=API&amp;px=52,27&amp;step=1\n\nVous devrez par la suite saisir les numéros de votre carte bancaire pour finaliser le paiement.\n\n-------------------------------\n');return(false)">Lien pour paiement</a></td>
                                <td><a href="#" onclick="addText('Sincères salutations, Jean-Charles Rambaud\n\nImpression Direct\nZA la colonne - rue des hirondelles\n85170 LE POIRE SUR VIE\nPort.: 06 47 28 54 54\nTél.: 02 51 34 65 30<br ></a>Fax :  0 821 488 050 / 02 51 34 65 30\njc.rambaud@impressiondirect.fr\nhttp://www.impressiondirect.fr\n\n-------------------------------\n');return(false)">JC Rambaud</a></td>
                            </tr>
                            <tr>
                                <td><a href="#" onclick="addText('Bonjour Mademoiselle,\n\n');return(false)">Mademoiselle</a></td>
                                <td></td>
                                <td><a href="#" onclick="addText('Sincères salutations, le service commercial\n\nImpression Direct\nZA la colonne - rue des hirondelles\n85170 LE POIRE SUR VIE\nTél.: 02 51 34 65 30\nFax :  0 821 488 050 / 02 51 34 65 30\nhttp://www.impressiondirect.fr\n\n-------------------------------\n');return(false)">Service commercial</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="#" onclick="addText('Sincères salutations, Service client\n\nImpression Direct\nZA la colonne - rue des hirondelles\n85170 LE POIRE SUR VIE\nTél.: 02 51 34 65 30\nFax :  0 821 488 050 / 02 51 34 65 30\nhttp://www.impressiondirect.fr\n\n-------------------------------\n');return(false)">Service client</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <button type="submit" class="btn btn-success">Envoyer le mail</button>
        </x-form.form>
    </x-form.card>
@stop

@section('js')
    @parent
    <script>
        var textarea = document.getElementById('message');
        function addText(text)
        {
            textarea.value += text;
        }

        function supprimer()
        {
            textarea.value = "";
        }
    </script>
@stop
