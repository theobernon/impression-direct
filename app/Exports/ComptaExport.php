<?php

namespace App\Exports;

use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComptaExport implements FromArray, WithCustomCsvSettings
{
    protected $request;

    function __construct($request)
    {
        $this->request = $request;
    }
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function array(): array
    {
        $dateDebut = date('Y-m-d H:i:s', strtotime($this->request->dateDebut));
        if ($this->request->dateFin)
        {
            $dateFin = date('Y-m-d H:i:s', strtotime($this->request->dateFin));
        }else{
            $dateFin = date('Y-m-d H:i:s');
        }
        //dd('date de début : '.$dateDebut.' - date de fin :'.$dateFin);
        $factures = json_decode(Http::withToken(session('key'))->post(env('API_PATH').'/export/', [
            'dateDebut'=>$dateDebut,
            'dateFin'=>$dateFin
        ]));
//        dd(
  //          $factures
    //    );
        return $factures;
    }
}
