<?php

namespace App\Http\Controllers;

use App\Enderecos;
use Illuminate\Http\Request;

class EntregasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function entregasMapa()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:81/public/enderecos-distancia",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $enderecos = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return view('entregas.entregas',[
                'enderecos' => json_decode($enderecos)
            ]);     
        }
                
      
    }
}
