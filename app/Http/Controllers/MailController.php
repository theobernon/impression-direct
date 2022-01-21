<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComptaExport;

class MailController extends Controller
{
    public function sendExport(Request $request)
    {
        $file = Excel::raw(new ComptaExport($request), \Maatwebsite\Excel\Excel::CSV);
        $data['email'] = "neyufx@gmail.com";
        $data['subject'] = "Export Compta";
        $data['body_message'] = "Veuillez trouvez en pièce jointe l'export des données pour la comptabilité";
        $data['file_name'] = "Document_compta.csv";


        Mail::send('export.mailView',$data, function ($message)use ($data, $file){
            $message->to($data['email'],$data['email'])
                ->subject($data['subject'])
                ->attachData($file, $data['file_name']);
            $message->from('neyufx3@gmail.com', 'Impression Direct');
        });
        if( count(Mail::failures()) > 0 ) {

            ///echo "There was one or more failures. They were: <br />";

            foreach(Mail::failures() as $email_address) {
                return redirect(route('export'))->with('error', 'Echec de l\'envoi de l\'export.');
            }

        } else {
            return redirect(route('export'))->with('success', 'Mail envoyée avec succés');
        }
    }
}
