<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;


class CommandeController extends Controller
{
    public function index(Request $request)
    {
        //dd(json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/')));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes?page='. $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandes',['commandes' => $commandes, 'pagination'=>$pagination]);
    }

    public function search(Request $request)
    {
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/search?page='. $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandes',['commandes' => $commandes, 'pagination'=>$pagination]);
    }

    public function delete(Request $request)
    {
        $commande = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/' . $request->noCommande));
        return view('commande.delete',['commande'=>$commande]);
    }

    public function destroy(Request $request)
    {
        /** PATCH DATA FOR STORE VISIT */
        /** @var Response $delete */
        //dd($request->v_id);
        $delete = json_decode(Http::withToken(session('key'))->delete(env('API_PATH') . '/commandes/destroy/' . $request->noCommande,));
        //dd($request->noCommande);
        return redirect(route('commande.index'))->with('error', 'Commande bien supprimée');
    }

    public function edit(Request $request)
    {
        /** PATCH DATA FOR STORE VISIT */
        /** @var Response $edit */
        //dd($request->v_id);
        $commande = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'.$request->noCommande));
        $clients = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/client/'));
        $fournisseurs = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/fournisseur/'));
        $commissions = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commission/'));
        $devis = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/' . $commande->noDevis));
        $lignes = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/' . $commande->noDevis . '/ligne'));
        return view('commande.editcommande',['commande'=>$commande])
            ->with('clients', $clients)->with('fournisseurs',$fournisseurs)
            ->with('commissions',$commissions)->with('devis', $devis)
            ->with('lignes',$lignes);
    }

    public function update(Request $request)
    {
        $commandes = Http::withToken(session('key'))->patch(env('API_PATH').'/commandes/edit/'.$request->noCommande,[
            'dateExpd' => $request->dateExpd,
            'refClient' => $request->refClient,
            'entCli' => $request->entCli,
            'adrSuivi' => $request->adrSuivi,
            'ad1' => $request->ad1,
            'ad2' => $request->ad2,
            'ad3' => $request->ad3,
            'tel' => $request->tel,
            'mailCom' => $request->mailCom,
            'livCli' => $request->livCli,
            'livAd1' => $request->livAd1,
            'livAd2' => $request->livAd2,
            'livAd3' => $request->livAd3,
            'noColissimo' => $request->noColissimo,
            'product' => $request->product,
            'moyenPaiement' => $request->moyenPaiement,
            'reduction' => $request->reduction,
            'pxttc' => $request->pxttc,
            'BAT' => $request->BAT,
            'dateExpedition' => $request->dateExpedition,
            'lienSuivi' => $request->lienSuivi,
            'momentPaiement' => $request->momentPaiement,
            'commentaire' => $request->commentaire,
            'transporteurClient' => $request->transporteurClient,
            'expertise' => $request->expertise,
            'pxTransporteur' => $request->pxTransporteur,
            'noDevisCommande' => $request->noDevisCommande,
            'refTransporteurs' => $request->refTransporteurs,
            'id_commission' => $request->id_commission
        ]);
        return redirect(route('commandes.detail',['noCommande'=>$request->noCommande]))->with('success','Commande bien modifiée');
    }

    public function show(Request $request)
    {
        /** GET commande FROM API */
        /** @var Response $show */
        $commande = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'.$request->noCommande));
        //dd($request->noCommande);
        return view('commande.detailCommandes', ['commande'=>$commande]);
    }

    public function clientAValider(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/clientAValider?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesClient', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function clientAValiderSearch(Request  $request)
    {
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/clientAValider/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesClient', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function commandesAValider(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aValider?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesAValider', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function commandesAValiderSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/aValider/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesAValider', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function commandeAExpedier(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aExpedier?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesAExpedier', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function aExpedierSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/aExpedier/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesAExpedier', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function validerClient(Request $request)
    {
        $commandes = json_decode(Http::withToken(session('key'))->patch(env('API_PATH') . '/commandes/'.$request->noCommande.'/validerClient'));
        return redirect(route('commande.index'))->with('success', 'Client validé');
    }

    public function validerCommande(Request $request)
    {
        $commandes = json_decode(Http::withToken(session('key'))->patch(env('API_PATH') . '/commandes/'.$request->noCommande.'/validerCommande'));
        return redirect(route('commande.index'))->with('success', 'Commande validé');
    }

    public function expedierCommande(Request $request)
    {
        $commandes = json_decode(Http::withToken(session('key'))->patch(env('API_PATH') . '/commandes/'.$request->noCommande.'/expedierCommande'));
        return redirect(route('commande.index'))->with('success', 'Commande validé');
    }

    public function commandeAFacturer(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aFacturer?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesAFacturer', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function aFacturerSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/aFacturer/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesAFacturer', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function commandeAEnvoyer(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aEnvoyer?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesAEnvoyer', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function aEnvoyerSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/aEnvoyer/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesAEnvoyer', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function commandeImpayes(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aPayer?page=' . $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
        ]);
        return view('commande.commandesImpayes', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function impayeeSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->post(env('API_PATH') . '/commandes/aPayer/search?page=' . $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesImpayes', ['commandes' => $commandes, 'pagination' => $pagination]);
    }


    public function showadd()
    {
        /** GET client FROM API */
        /** @var Response $clients */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'));
        $clients = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/client/'));
        $teleprospecteur = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/teleprospecteur/'));
        $fournisseurs = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/fournisseur/'));
        $commissions = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commission/'));
        $products = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/product/'));


        //dd($request->refClient);
        return view('commande.addcommande', ['commandes'=>$commandes,'teleprospecteur'=>$teleprospecteur,'clients'=>$clients,'fournisseurs'=>$fournisseurs,'commissions'=>$commissions,'products'=>$products]);
    }

    public function create(Request $request)
    {
        /** GET client FROM API */
        /** @var Response $clients */
        //dd($request->id_teleprospecteur);
        $commandes = Http::withToken(session('key'))->post(env('API_PATH').'/commandes/create',[
            'dateExpd' => $request->dateExpd,
            'refClient' => $request->refClient,
            'entCli' => $request->entCli,
            'adrSuivi' => $request->adrSuivi,
            'ad1' => $request->ad1,
            'ad2' => $request->ad2,
            'ad3' => $request->ad3,
            'tel' => $request->tel,
            'mailCom' => $request->mailCom,
            'livCli' => $request->livCli,
            'livAd1' => $request->livAd1,
            'livAd2' => $request->livAd2,
            'livAd3' => $request->livAd3,
            'noColissimo' => $request->noColissimo,
            'product' => $request->product,
            'moyenPaiement' => $request->moyenPaiement,
            'reduction' => $request->reduction,
            'pxttc' => $request->pxttc,
            'BAT' => $request->BAT,
            'dateExpedition' => $request->dateExpedition,
            'lienSuivi' => $request->lienSuivi,
            'momentPaiement' => $request->momentPaiement,
            'commentaire' => $request->commentaire,
            'transporteurClient' => $request->transporteurClient,
            'expertise' => $request->expertise,
            'pxTransporteur' => $request->pxTransporteur,
            'noDevisCommande' => $request->noDevisCommande,
            'refTransporteurs' => $request->refTransporteurs,
            'id_commission' => $request->id_commission,
        ]);
        //dd($request->teleprospecteur);
        return redirect(route('commande.index'))->with('success', 'Commande correctement ajouté');
    }


    public function commandesFacturees(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/facturee?page='. $request->page));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesFacturees', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function factureeSearch(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/facturee/search?page='. $request->page, [
            'search'=>$request->q
        ]));
        $pagination = new LengthAwarePaginator($commandes, $commandes->total, $commandes->perpage,$commandes->current_page,[
            'path' => $request->url(),
            'query' => $request->query()
        ]);
        return view('commande.commandesFacturees', ['commandes' => $commandes, 'pagination' => $pagination]);
    }

    public function showFacture(Request $request)
    {
        /** GET client FROM API */
        /** @var Response $clients */
        return view('facture',[
            'commande' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'.$request->noCommande))[0],
            'devis' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/commande/'.$request->noCommande)),
            'lignes' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis)),

        ]);
        //dd($request->refClient);
        //return view('facture', ['commandes'=>$commandes,'teleprospecteur'=>$teleprospecteur,'clients'=>$clients,'fournisseurs'=>$fournisseurs,'devis'=>$devis,'lignes'=>$lignes]);
    }

    public function commandesGenereFacture(Request $request)
    {
        /** GET commandes FROM API */
        /** @var Response $genereFacture */
        $genereFacture = Http::withToken(session('key'))->patch(env('API_PATH') . '/commandes/nFact/'.$request->noCommande);
        return view('commande.index');
    }

}
