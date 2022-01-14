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

Route::middleware(\App\Http\Middleware\EnsureTokenIsValid::class)->group(function () {

    Route::post('/disconnect', [ConnectionController::class, 'disconnect'])->name('disconnect');

    Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('commande.facture');

#---- Routes commandes ----#

    Route::get('/commandes', [CommandeController::class, 'index'])->name('commande.index');
    Route::get('commande/{noCommande}/delete',[CommandeController::class,'delete'])->name('commande.delete');
    Route::delete('commande/{noCommande}/destroy', [CommandeController::class, 'destroy'])->name('commande.destroy');
    Route::get('/comm andes/edit', [CommandeController::class, 'edit'])->name('commande.edit');
    Route::get('/commandes/formulaire',[CommandeController::class,'showadd'])->name('commande.ajouter');
    Route::post('/commandes/ajouter', [CommandeController::class, 'create'])->name('commande.create');
    Route::get('/commandes/facture/{noCommande}',[CommandeController::class,'showFacture'])->name('commande.facture');
    Route::patch('/generefacture/{noCommande}',[CommandeController::class,'commandesGenereFacture'])->name('commande.add.facture');

    Route::get('/commandesAEnvoyer', function () {
        return view('/commande/commandesAEnvoyer');
    });
    Route::get('/commandes/commandesClient', [CommandeController::class, 'clientAValider'])->name('commande.clientValider');
    Route::get('/commandes/commandesAValider', [CommandeController::class, 'commandesAValider'])->name('commande.commandeAValidee');
    Route::get('/commandes/commandesAExpedier', [CommandeController::class, 'commandeAExpedier'])->name('commande.commandeAExpedier');
    Route::get('/commandes/commandesAFacturer', [CommandeController::class, 'commandeAFacturer'])->name('commande.commandeAFacturer');
    Route::get('/commandes/commandesAEnvoyer', [CommandeController::class, 'commandeAEnvoyer'])->name('commande.commandeAEnvoyer');
    Route::get('/commandes/commandesImpayes', [CommandeController::class, 'commandeImpayes'])->name('commande.commandeImpayes');
    Route::get('/commandes/commandesFacturees', [CommandeController::class, 'commandesFacturees'])->name('commande.commandesFacturees');
    Route::get('/commandes/detail/{noCommande}', [CommandeController::class, 'show'])->name('commandes.detail');
    Route::get('mail/mailFacture', [MailFactureController::class, 'mail']);

    Route::get('/commandes/{noCommande}/validerClient',[CommandeController::class, 'validerClient'])->name('commande.validerClient');
    Route::get('/commandes/{noCommande}/valider',[CommandeController::class, 'valider'])->name('commande.valider');
    Route::get('/commandes/{noCommande}/expedier',[CommandeController::class, 'expedier'])->name('commande.expedier');

#---- Routes commandes ----#

#---- Routes clients ----#
    Route::get('/client', [ClientController::class, 'index'])->name('client.index');
    Route::post('/client/destroy/{refClient}', [ClientController::class, 'delete'])->name('client.delete');
    Route::get('/client/detail/{refClient}', [ClientController::class, 'show'])->name('client.detail');
    Route::post('/client/edit/{refClient}', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/client/formulaire',[ClientController::class,'showadd'])->name('client.ajouter');
    Route::post('/client/ajouter', [ClientController::class, 'create'])->name('client.create');
    Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
    Route::post('/client/edit/{refClient}/update', [ClientController::class, 'update'])->name('client.update');
    Route::get('/commandes/client/{refClient}',[ClientController::class,'showCommande'])->name('client.commande');


#---- Routes devis ----#
    Route::get('/devis', [DevisController::class, 'index'])->name('devis.index');
    Route::get('/ligneDevis/detail/{noDevis}', [DevisController::class, 'showDetailLigne'])->name('devis.detailLigne');
    Route::view('/devis/form','addDevis')->name('devis.form');
    Route::post('/devis/ajouter', [DevisController::class, 'create'])->name('devis.create');
    Route::post('/ligneDevis/ajouter', [DevisController::class, 'createLigneDevis'])->name('ligneDevis.create');
    Route::get('/ligneDevis/form/{noDevis}', [DevisController::class, 'formLigneDevis'])->name('ligneDevis.form');
    Route::get('/devis/ajouter/commande/{noDevis}/{refClient}', [DevisController::class, 'formCommandeDevis'])->name('devis.commande.create');


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
});
