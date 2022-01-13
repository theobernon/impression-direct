<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DevisController extends Controller
{
    public function index()
    {
        /** GET devis FROM API */
        /** @var Response $devis */
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'));
        return view('devis', ['devis'=>$devis]);
    }

    public function create(Request $request)
    {
        /** GET client FROM API */
        /** @var Response $devis */
        $devis = Http::withToken(session('key'))->post(env('API_PATH').'/devis/create',[
            'dateDevis' => $request->dateDevis,
            'refClient' => $request->refClient,
            'tva' => $request->tva
            ]);
        return redirect(route('devis.index'))->with('success', 'Devis correctement ajouté');
    }

    public function createLigneDevis(Request $request)
    {
        /** GET client FROM API */
        /** @var Response $devis */

        $devis = Http::withToken(session('key'))->post(env('API_PATH').'/ligneDevis/create',[
            'noDevis' => $request->noDevis,
            'produitDevis' => $request->Produit,
            'typePapierDevis' => $request->TypePapier,
            'couleurPapierDevis' => $request->couleurPapier,
            'dimPapierDevis' => $request->DimPapier,
            'impRecto' => $request->ImpRecto,
            'impVerso' => $request->ImpVerso,
            'optionDevis' => $request->Options,
            'finitionDevis' => $request->Finitions,
            'sousTraitantDevis' => $request->SousTraitant,
            'supplierDevis' => $request->Supplier,
            'comCliDevis' => $request->ComCli,
            'comEntDevis' => $request->ComEnt,
            'qteDevis' => $request->Qte,
            'prixDevis' => $request->Prix,
            'envoiDevis' => $request->envoye,
            'prixUnit'=>$request->prixUnit
        ]);
        return redirect(route('devis.index'))->with('success', 'La ligne a bien été ajoutée');
    }

    public function formLigneDevis(Request $request)
    {
        /** GET dLigne FROM API */
        /** @var Response $lignes */
        $lignes = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis));
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));
        return view('addLigneDevis', ['lignes'=>$lignes, 'devis'=>$devis]);
    }

    public function showDetailLigne(Request $request)
    {
        /** GET dLigne FROM API */
        /** @var Response $devisLigne */
        $devisLigne = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis));
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));

        return view('detailDevis', ['devisLigne'=>$devisLigne, 'devis'=>$devis]);
    }

    public function formCommandeDevis(Request $request)
    {
        /** GET dLigne FROM API */
        /** @var Response $lignes */
        /** @var Response $devis */
        $lignes = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis));
        $totalPrixHT = 0;
        foreach($lignes as $ligne){

            $totalPrixHT += $ligne->Prix;
        }

        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));
        $clients = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/client/'.$request->refClient));
        $teleprospecteur = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/teleprospecteur/'));
        $fournisseurs = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/fournisseur/'));
        $commissions = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commission/'));
        return view('addCommandeByDevis', ['lignes'=>$lignes, 'devis'=>$devis,'teleprospecteur'=>$teleprospecteur,
            'fournisseurs'=>$fournisseurs,'commissions'=>$commissions,'clients'=>$clients,'totalHT'=>$totalPrixHT]);
    }


}

