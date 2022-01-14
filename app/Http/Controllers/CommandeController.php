<?php

namespace App\Http\Controllers;

use App\Models\Commandes;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CommandeController extends Controller
{
    public function index()
    {
        //dd(json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/')));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        return view('commande.commandes',['commandes' => $commandes]);
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
        $edit = Http::withToken(session('key'))->get(env('API_PATH') . '/commande/edit/' . $request->noCommande,);
        return redirect(route('commande.index'))->with('success', 'Commande éditée');
    }

    public function show(Request $request)
    {
        /** GET commande FROM API */
        /** @var Response $show */
        $commande = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'.$request->noCommande));
        //dd($request->noCommande);
        return view('commande.detailCommandes', ['commande'=>$commande]);
    }

    public function clientAValider()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/clientAValider'));
        return view('commande.commandesClient', ['commandes' => $commandes]);
    }

    public function commandesAValider()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aValider'));
        return view('commande.commandesAValider', ['commandes' => $commandes]);
    }

    public function commandeAExpedier()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aExpedier'));
        return view('commande.commandesAExpedier', ['commandes' => $commandes]);
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

    public function commandeAFacturer()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aFacturer'));
        return view('commande.commandesAFacturer', ['commandes' => $commandes]);
    }

    public function commandeAEnvoyer()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aEnvoyer'));
        return view('commande.commandesAEnvoyer', ['commandes' => $commandes]);
    }

    public function commandeImpayes()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aPayer'));
        return view('commande.commandesImpayes', ['commandes' => $commandes]);
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


        //dd($request->refClient);
        return view('commande.addcommande', ['commandes'=>$commandes,'teleprospecteur'=>$teleprospecteur,'clients'=>$clients,'fournisseurs'=>$fournisseurs,'commissions'=>$commissions]);
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
            'produitsCom' => $request->produitsCom,
            'moyenPaiement' => $request->moyenPaiement,
            'reduction' => $request->reduction,
            'pxttc' => $request->pxttc,
            'BAT' => $request->BAT,
            'dateExpedition' => $request->dateExpedition,
            'lienSuivi' => $request->lienSuivi,
            'momentPaiement' => $request->momentPaiement,
            'commentaire' => $request->commentaire,
            'transporteurClient' => $request->transporteurClient,
            'expertiseCommande' => $request->expertiseCommande,
            'pxTransporteur' => $request->pxTransporteur,
            'noDevisCommande' => $request->noDevisCommande,
            'refTransporteurs' => $request->refTransporteurs,
            'id_commission' => $request->id_commission
        ]);
        //dd($request->teleprospecteur);
        return redirect(route('commande.index'))->with('success', 'Commande correctement ajouté');
    }


    public function commandesFacturees()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        return view('commande.commandesFacturees', ['commandes' => $commandes]);
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
