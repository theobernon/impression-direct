@extends('adminlte::page')

@section('title', 'ImpressionDirect')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des mails</h1>
    <p class="m-0 text-dark">Page de contact permettant l'envoie de mails</p>
@stop

@section('content')


    <x-form.card title="Envoi mail" class="">
        <x-form.form action="">
            <x-form.group value="" label="Destinataire" type="" id="destinataire" required=""></x-form.group>
            <div class="form-group col-sm-6">
                <label>Choix de l'expéditeur</label>
                <select class="form-control" name="expediteur">
                    @foreach($email as $em)
                        <option value="{{$em[0]}}">{{$em[1]}}</option>
                    @endforeach
                </select>
            </div>
            <x-form.group value="" label="Expediteur" type="" id="expediteur2" required=""></x-form.group>
            <x-form.group value="" label="Sujet" type="" id="sujet" required=""></x-form.group>
            <x-form.textarea label="Votre message" value="" name="message"></x-form.textarea>

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
                                <td><a href="#">Monsieur</a></td>
                                <td><a href="#">Nouvelle commande</a></td>
                                <td><a href="#">Guillaume Chaudet</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Madame</a></td>
                                <td><a href="#">Lien pour paiement</a></td>
                                <td><a href="#">JC Rambaud</a></td>
                            </tr>
                            <tr>
                                <td><a href="#">Mademoiselle</a></td>
                                <td></td>
                                <td><a href="#">Service commercial</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><a href="#">Service client</a></td>
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
