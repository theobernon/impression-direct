<div style="overflow-x: auto;">
    <table class="table table-bordered table-striped datatable">
        <thead>
        <tr>
            <th>Num Commande</th>
            <th style="width: 10px">Nom de l'entreprise</th>
            <th>Prix TTC</th>
            <th>Moyen payement</th>
            <th>Date commande</th>
            <th>Validation Client</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commandes as $commande)
            <x-commande-client-row :commande="$commande" />
        @endforeach
        </tbody>
    </table>
</div>
