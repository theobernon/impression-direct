<div>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bd-example-modal-xl">Ajouter un produit</button>
</div>
<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myExtraLargeModalLabel">Ajout d'un produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-msg" class="text-danger"></p>
                <row class="col-sm-10 row">
                    <x-form.group value="" label="Produit" type="" id="Produit" required="required"></x-form.group>
                    <x-form.group value="" label="Quantité" type="number" id="Qte" required="required"></x-form.group>
                    <x-form.group value="" label="Dimension papier" type="" id="DimPapier" required="required"></x-form.group>
                    <x-form.group value="" label="Options" type="" id="Options" required="required"></x-form.group>
                    <x-form.group value="" label="Prix" type="number" id="Prix" required="required"></x-form.group>
                    <x-form.group value="" label="Couleur du papier" type="" id="couleurPapier" required="required"></x-form.group>
                    <x-form.group value="" label="Finitions du papier" type="" id="Finitions" required="required"></x-form.group>
                    <x-form.group value="" label="Choix du type papier" type="" id="TypePapier" required="required"></x-form.group>
                    <span class="btn btn-danger" onclick="addProduct()">Ajouter</span>
                </row>
            </div>
        </div>
    </div>
</div>
