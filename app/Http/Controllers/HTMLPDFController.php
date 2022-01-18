<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class HTMLPDFController extends Controller
{
    /**
     * generate PDF file from blade view.
     *
     * @return \Illuminate\Http\Response
     */
    public function htmlPdf()
    {
        // selecting PDF view
        $pdf = PDF::LoadView('htmlPdf');

        // download pdf file
        return $pdf->download('pdfview.pdf');
    }
}
