<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class DevisController extends Controller
{
    public function index(Request $request)
    {
        /** GET devis FROM API */
        /** @var Response $devis */
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/devis?page='.$request->page));

        $pagination = new LengthAwarePaginator($devis, $devis->total, $devis->perpage,$devis->current_page,[
            'path' => $request->url(),
        ]);
        return view('devis.devis', ['devis'=>$devis])->with('pagination',$pagination);
    }

    public function search(Request $request)
    {
        /** GET devis FROM API */
        /** @var Response $devis */
        $devis = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/devis/search?page='.$request->page, [
            'search'=>$request->q,
        ]));
        $pagination = new LengthAwarePaginator($devis, $devis->total, $devis->perpage,$devis->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('devis.devis', ['devis'=>$devis])->with('pagination',$pagination);
    }

    public function edit(Request $request)
    {
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));
        return view('devis.editDevis', ['devis'=>$devis]);
    }

    public function update(Request $request)
    {
        $devis = json_decode(Http::withToken(session('key'))->post(env('API_PATH').'/devis/edit/'.$request->noDevis, [
            'dateDevis'=>date('Y-m-d H:i:s', strtotime($request->dateDevis)),
            'refClient'=>$request->refClient,
            'tva'=>$request->tva
        ]));
        return redirect(route('devis.index'))->with('success', 'Devis correctement modifié');
    }

    public function delete(Request $request)
    {
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));
        return view('devis.delete',['devis'=>$devis]);
    }

    public function destroy(Request $request)
    {
        $devis = json_decode(Http::withToken(session('key'))->delete(env('API_PATH').'/devis/destroy/'.$request->noDevis));
        return redirect(route('devis.index'))->with('error','Devis correctement supprimé');
    }

    public function archivees()
    {
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/archivees'));
        return view('devis.archivees', ['devis'=>$devis]);
    }

    public function archiveSearch(Request $request)
    {
        if (isset($request->q))
        {
            $devis = json_decode(Http::withToken(session('key'))->post(env('API_PATH').'/devis/archivees/search' , [
                'search'=>$request->q,
            ]));
        }else{
            $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/archivees'));
        }
        return view('devis.archivees',['devis'=>$devis]);
    }

    public function add()
    {
        $clients = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/client/'));
        return view('devis.addDevis', ['clients'=>$clients]);
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
            'envoiDevis' => intval($request->envoye),
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
        return view('devis.addLigneDevis', ['lignes'=>$lignes, 'devis'=>$devis]);
    }

    public function showDetailLigne(Request $request)
    {
        /** GET dLigne FROM API */
        /** @var Response $devisLigne */
        $devisLigne = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis));
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/'.$request->noDevis));
        return view('devis.detailDevis', ['devisLigne'=>$devisLigne, 'devis'=>$devis]);
    }

    public function editLigne(Request $request)
    {
        $ligne = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/'.$request->noLigne));
        return view('devis.editLigne', ['ligne'=>$ligne]);
    }

    public function updateLigne(Request $request)
    {
        $devis = Http::withToken(session('key'))->post(env('API_PATH').'/ligneDevis/edit/' . $request->noLigne,[
            'noDevis' => $request->noDevis,
            'Produit' => $request->Produit,
            'TypePapier' => $request->TypePapier,
            'couleurPapier' => $request->couleurPapier,
            'DimPapier' => $request->DimPapier,
            'ImpRecto' => $request->ImpRecto,
            'ImpVerso' => $request->ImpVerso,
            'Options' => $request->Options,
            'Finitions' => $request->Finitions,
            'SousTraitant' => $request->SousTraitant,
            'Supplier' => $request->Supplier,
            'ComCli' => $request->ComCli,
            'ComEnt' => $request->ComEnt,
            'Qte' => $request->Qte,
            'Prix' => $request->Prix,
            'envoye' => intval($request->envoye),
            'prixUnit'=>$request->prixUnit
        ]);
        return redirect(route('devis.detailLigne',['noDevis'=>$request->noDevis]));
    }

    public function deleteLigne(Request $request)
    {
        $ligne = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/'.$request->noLigne));
        return view('devis.deleteLigne',['ligne'=>$ligne]);
    }

    public function destroyLigne(Request $request)
    {
        $delete = json_decode(Http::withToken(session('key'))->delete(env('API_PATH') . '/ligneDevis/destroy/' . $request->noLigne,));
        //dd($request->noCommande);
        return redirect(route('devis.index'))->with('error', 'Ligne bien supprimée');
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
        return view('devis.addCommandeByDevis', ['lignes'=>$lignes, 'devis'=>$devis,'teleprospecteur'=>$teleprospecteur,
            'fournisseurs'=>$fournisseurs,'commissions'=>$commissions,'clients'=>$clients,'totalHT'=>$totalPrixHT]);
    }


}

