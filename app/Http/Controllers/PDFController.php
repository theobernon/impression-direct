<?php



namespace App\Http\Controllers;



use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



use Barryvdh\DomPDF\PDF;



class PDFController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function generatePDF(Request $request)

    {

        $data = [
            'commande' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/commandes/'.$request->noCommande))[0],
            'devis' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/devis/commande/'.$request->noCommande)),
            'lignes' => json_decode(Http::withToken(session('key'))->get(env('API_PATH').'/ligneDevis/devis/'.$request->noDevis)),

        ];



        $pdf = PDF::loadView('facture', $data);



        return $pdf->download('testFact.pdf');

    }

}
