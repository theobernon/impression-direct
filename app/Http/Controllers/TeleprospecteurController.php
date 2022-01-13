<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeleprospecteurController extends Controller
{
    public function index()
    {
        /** GET client FROM API */
        /** @var Response $teleprospecteurs */
        $teleprospecteurs = json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/teleprospecteur/'));
        //dd($request->refClient);
        return view('addclient', ['teleprospecteurs'=>$teleprospecteurs]);
    }
}
