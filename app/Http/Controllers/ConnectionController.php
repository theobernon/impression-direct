<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ConnectionController extends Controller
{
    private $token = "";

    public function index()
    {
        return view('auth.login');
    }

    public static function login(Request $request)
    {
        /** POST DATA FOR CONNECTION */
        /** @var Response $login */
        $login = Http::post(env('API_PATH').'/login', [
            'email' => $request->email,
            'password' => $request->password]);

        /** TEST CONNECTION */
//        dd($login['id']);
//        dd($login->getStatusCode());
        if ($login->getStatusCode() == 200) {
            session_start();
            session(['key' => $login['token'], 'id' => $login['id']]);
            return redirect('/commandes');
        } else {
            return redirect('connection');
        }
    }

    public function disconnect()
    {
        /** DISCONNECT */
        session()->forget('key');
        return redirect('connection');
    }
}
