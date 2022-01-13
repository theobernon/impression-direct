<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FournisseursController extends Controller
{
    public function index()
    {
        /** GET fournisseur FROM API */
        /** @var Response $fournisseurs */
        $fournisseurs = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/fournisseur/'));
        return view('fournisseurs', ['fournisseurs'=>$fournisseurs]);
    }
}
