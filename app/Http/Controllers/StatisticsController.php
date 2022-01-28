<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Http;

class StatisticsController extends Controller
{
    public function commandeAEnvoyer()
    {
        /** GET commandes FROM API */
        /** @var Response $clientValider */
        //$commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/'));
        $commandes = json_decode(Http::withToken(session('key'))->get(env('API_PATH') . '/commandes/aEnvoyer'));

        dd(count($commandes->expediee));
    }
}
