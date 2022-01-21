<?php

namespace App\Http\Controllers;

use App\Exports\ComptaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    public function download(Request $request)
    {
        return Excel::download(new ComptaExport($request), 'Document_compta.csv');
    }
}
