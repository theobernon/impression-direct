<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Liste des commandes
        </h3>
        <div class="card-tools">
            <form method="GET" action="{{$action}}">
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
    <div class="d-flex justify-content-end mr-2">
        {{($pagination->links('pagination::bootstrap-4'))}} {{--Pagination Links--}}
    </div>
</div>
