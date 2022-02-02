<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComptaExport;

class MailController extends Controller
{

    public function index()
    {
        $email = array(
            array('administration@impressiondirect.fr','administration'),
            array('commande@impressiondirect.fr','commande'),
            array('comptabilite@impressiondirect.fr','comptabilite'),
            array('contact@impressiondirect.fr','contact'),
            array('description@impressiondirect.fr','description'),
            array('devis@impressiondirect.fr','devis'),
            array('echantillon@impressiondirect.fr','echantillon'),
            array('expedition@impressiondirect.fr','expedition'),
            array('facturation@impressiondirect.fr','facturation'),
            array('fichier@impressiondirect.fr','fichier'),
            array('','-----------------'),

            array('g.chaudet@impressiondirect.fr','g.chaudet'),
            array('jc.rambaud@impressiondirect.fr','jc.rambaud'),
            array('m.maupetit@impressiondirect.fr','m.maupetit')
        );

        return view('mail.index', ['email'=>$email]);
    }

    public function emailSend(Request $request)
    {
        $email = array(
            array('administration@impressiondirect.fr','administration'),
            array('commande@impressiondirect.fr','commande'),
            array('comptabilite@impressiondirect.fr','comptabilite'),
            array('contact@impressiondirect.fr','contact'),
            array('description@impressiondirect.fr','description'),
            array('devis@impressiondirect.fr','devis'),
            array('echantillon@impressiondirect.fr','echantillon'),
            array('expedition@impressiondirect.fr','expedition'),
            array('facturation@impressiondirect.fr','facturation'),
            array('fichier@impressiondirect.fr','fichier'),
            array('','-----------------'),

            array('g.chaudet@impressiondirect.fr','g.chaudet'),
            array('jc.rambaud@impressiondirect.fr','jc.rambaud'),
            array('m.maupetit@impressiondirect.fr','m.maupetit')
        );

        $data['email'] = $request->destinataire;
        $data['subject'] = $request->sujet;
        $data['body_message'] = $request->message;
        Mail::to($data['email'])->send(new MailSender($data));
//        Mail::send('mail.send',$data, function ($message)use ($data){
//            $message->to($data['email'],$data['email'])
//                ->subject($data['subject']);
//            $message->from('neyufx3@gmail.com', 'Impression Direct');
//        });

        return redirect(route('mail.index'))->with('success', 'Email envoyé avec succés');
    }

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
