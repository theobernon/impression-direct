<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\PartenairesController;
use App\Http\Controllers\TeleprospecteurController;
use App\Http\Controllers\MailFactureController;
use App\Http\Controllers\PDFController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
//Auth::routes();


$path = 'http://localhost:8001/api';

Route::get('/', [ConnectionController::class, 'index'])->name('connection');
Route::get('/connection', [ConnectionController::class, 'index'])->name('connection');
Route::post('/login', [ConnectionController::class, 'login'])->name('login');
Route::get('/', function () {
   if (session('key')){
       return redirect()->back();
   }
   return redirect(route('connection'));
});

Route::middleware(\App\Http\Middleware\EnsureTokenIsValid::class)->group(function () {

    Route::get('/disconnect', [ConnectionController::class, 'disconnect'])->name('disconnect');

    Route::get('htmlPdf', [CommandeController::class, 'htmlPdf'])->name('htmlPdf');

#---- Routes commandes ----#

    Route::get('/commandes', [CommandeController::class, 'index'])->name('commande.index');
    Route::get('/commandes/search', [CommandeController::class, 'search'])->name('commande.search');
    Route::get('commande/{noCommande}/delete',[CommandeController::class,'delete'])->name('commande.delete');
    Route::delete('commande/{noCommande}/destroy', [CommandeController::class, 'destroy'])->name('commande.destroy');
    Route::get('/commandes/edit', [CommandeController::class, 'edit'])->name('commande.edit');
    Route::get('/commandes/formulaire',[CommandeController::class,'showadd'])->name('commande.ajouter');
    Route::post('/commandes/ajouter', [CommandeController::class, 'create'])->name('commande.create');

    Route::get('/commandes/facture/{noCommande}',[CommandeController::class,'showFacture'])->name('commande.facture');
    Route::patch('/generefacture/{noCommande}',[CommandeController::class,'commandesGenereFacture'])->name('commande.add.facture');

    Route::get('/commandesAEnvoyer', function () {
        return view('/commande/commandesAEnvoyer');
    });

    Route::get('/commandes/commandesClient', [CommandeController::class, 'clientAValider'])->name('commande.clientValider');
    Route::get('/commandes/commandesClient/search', [CommandeController::class, 'clientAValiderSearch'])->name('commande.clientValider.search');
    Route::get('/commandes/commandesAValider', [CommandeController::class, 'commandesAValider'])->name('commande.commandeAValidee');
    Route::get('/commandes/commandesAValider/search', [CommandeController::class, 'commandesAValiderSearch'])->name('commande.commandeAValidee.search');
    Route::get('/commandes/commandesAExpedier', [CommandeController::class, 'commandeAExpedier'])->name('commande.commandeAExpedier');
    Route::get('/commandes/commandesAExpedier/search', [CommandeController::class, 'aExpedierSearch'])->name('commande.commandeAExpedier.search');
    Route::get('/commandes/commandesAFacturer', [CommandeController::class, 'commandeAFacturer'])->name('commande.commandeAFacturer');
    Route::get('/commandes/commandesAFacturer/search', [CommandeController::class, 'aFacturerSearch'])->name('commande.aFacturer.search');
    Route::get('/commandes/commandesAEnvoyer', [CommandeController::class, 'commandeAEnvoyer'])->name('commande.commandeAEnvoyer');
    Route::get('/commandes/commandesAEnvoyer/search', [CommandeController::class, 'aEnvoyerSearch'])->name('commande.aEnvoyer.search');
    Route::get('/commandes/commandesImpayes', [CommandeController::class, 'commandeImpayes'])->name('commande.commandeImpayes');
    Route::get('/commandes/commandesImpayes/search', [CommandeController::class, 'impayeeSearch'])->name('commande.impayes.search');
    Route::get('/commandes/facturees', [CommandeController::class, 'commandesFacturees'])->name('commande.facturees');
    Route::get('/commandes/facturees/search', [CommandeController::class, 'factureeSearch'])->name('search.commandeFacturees');
    Route::get('/commandes/detail/{noCommande}', [CommandeController::class, 'show'])->name('commandes.detail');
    Route::get('/commandes/{noCommande}/edit', [CommandeController::class, 'edit'])->name('commande.edit');
    Route::post('/commandes/{noCommande}/update', [CommandeController::class, 'update'])->name('commande.update');
    Route::get('mail/mailFacture', [MailFactureController::class, 'mail']);

    Route::get('/commandes/{noCommande}/validerClient',[CommandeController::class, 'validerClient'])->name('commande.validerClient');
    Route::get('/commandes/{noCommande}/validerCommande',[CommandeController::class, 'validerCommande'])->name('commande.validerCommande');
    Route::get('/commandes/{noCommande}/expedierCommande',[CommandeController::class, 'expedierCommande'])->name('commande.expedierCommande');


#---- Routes commandes ----#

#---- Routes clients ----#
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::get('/client/search', [ClientController::class, 'search'])->name('client.search');
    Route::get('/client/detail/{refClient}', [ClientController::class, 'show'])->name('client.detail');
    Route::post('/client/delete/{refClient}', [ClientController::class, 'delete'])->name('client.delete');
    Route::post('/client/edit/{refClient}', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/client/formulaire',[ClientController::class,'showadd'])->name('client.ajouter');
    Route::post('/client/ajouter', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::post('/client/edit/{refClient}/update', [ClientController::class, 'update'])->name('client.update');
    Route::get('/commandes/client/{refClient}',[ClientController::class,'showCommande'])->name('client.commande');

#---- Routes devis ----#

    Route::get('/devis', [DevisController::class, 'index'])->name('devis.index');
    Route::get('/devis/search', [DevisController::class, 'search'])->name('devis.search');
    Route::get('/devis/edit/{noDevis}', [DevisController::class, 'edit'])->name('devis.edit');
    Route::post('/devis/update/{noDevis}', [DevisController::class, 'update'])->name('devis.update');
    Route::get('/devis/delete/{noDevis}', [DevisController::class, 'delete'])->name('devis.delete');
    Route::delete('/devis/destroy/{noDevis}', [DevisController::class, 'destroy'])->name('devis.destroy');
    Route::get('/ligneDevis/detail/{noDevis}', [DevisController::class, 'showDetailLigne'])->name('devis.detailLigne');
    Route::get('/ligneDevis/edit/{noLigne}', [DevisController::class, 'editLigne'])->name('devis.editLigne');
    Route::post('/ligneDevis/update/{noLigne}', [DevisController::class, 'updateLigne'])->name('devis.updateLigne');
    Route::get('/devis/form', [DevisController::class, 'add'])->name('devis.form');
    Route::post('/devis/ajouter', [DevisController::class, 'create'])->name('devis.create');
    Route::post('/ligneDevis/ajouter', [DevisController::class, 'createLigneDevis'])->name('ligneDevis.create');
    Route::get('/ligneDevis/form/{noDevis}', [DevisController::class, 'formLigneDevis'])->name('ligneDevis.form');
    Route::get('/devis/ajouter/commande/{noDevis}/{refClient}', [DevisController::class, 'formCommandeDevis'])->name('devis.commande.create');
    Route::get('/ligneDevis/delete/{noLigne}', [DevisController::class, 'deleteLigne'])->name('devis.deleteLigne');
    Route::delete('/ligneDevis/destroy/{noLigne}', [DevisController::class, 'destroyLigne'])->name('devis.destroyLigne');
    Route::get('/devisPdf', [DevisController::class, 'devisPdf'])->name('devisPdf');


#---- Routes devis ----#

#---- Routes Fournisseurs ----#
    Route::get('/fournisseurs', [FournisseursController::class, 'index'])->name('fournisseur.index');
#---- Routes Fournisseurs ----#

#---- Routes partenaires ----#
    Route::get('/partenaire/index', [PartenairesController::class, 'index'])->name('partenaire.index');
    Route::post('/partenaire/create', [PartenairesController::class, 'create'])->name('partenaire.create');
    Route::post('/partenaire/update', [PartenairesController::class, 'update'])->name('partenaire.update');
#---- Routes partenaires ----#




#---- Routes statistiques ----#
    Route::get('/statistics', function () {
        return view('statistics');
    });
#---- Routes statistiques ----#

#---- Routes productModif ----#
    Route::get('/productModif', function () {
        return view('productModif');
    });
#---- Routes productModif ----#


#---- Export Compta ----#
   Route::get('/export', [\App\Http\Controllers\ExportController::class, 'index'])->name('export');
   Route::post('/export/download', [\App\Http\Controllers\ExportController::class, 'download'])->name('export.download');
   Route::post('/export/send', [\App\Http\Controllers\MailController::class, 'sendExport'])->name('export.send');
   #---- Export Compta ----#

    #--- Routes Envoi mail ---#
    Route::get('/email', [\App\Http\Controllers\MailController::class, 'index'])->name('mail.index');
    Route::post('/email/send', [\App\Http\Controllers\MailController::class, 'emailSend'])->name('mail.send');
    #--- Routes Envoi mail ---#
});
