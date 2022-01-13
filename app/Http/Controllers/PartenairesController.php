<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PartenairesController extends Controller
{
    public function index()
    {
        /** GET partenaire FROM API */
        /** @var Response $partenaires */
        $partenaires = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/teleprospecteur/'));
        return view('partenaire.index', ['partenaires'=>$partenaires]);
    }

    public function create(Request $request)
    {
//        $partenaires = Http::withToken(session('key'))->post(env('API_PATH').'/teleprospecteur/create', [
//            'num' => $request->num,
//            'nom' => $request->nom,
//            'prenom' => $request->prenom,
//            'numEntreprise' => $request->numEntreprise,
//            'email' => $request->email,
//            'tel' => $request->tel,
//        ]);
//        return redirect(route('partenaire.index'))->with('success', 'Client correctement ajouté');
            return view('partenaire.create');
    }

    public function update(Request $request)
    {

        return view('partenaire.update');
    }

    public function store(Request $request)
    {

    }
}
