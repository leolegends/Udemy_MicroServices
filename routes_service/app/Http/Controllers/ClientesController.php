<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Repositories\GoogleRepository as Google;

class ClientesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadClientesCSV(Request $data)
    {

            $handle = fopen($data->file('arquivo'), "r");

            $header = null;

            while(($row = fgetcsv($handle, 1000, ";")) !== false)
            {
                $cliente = $this->cadastraCliente($row);
                $endereco = Google::converteEndereco($row[4]);
                
                $latitude = $endereco[0]->getGeometry()->getLocation()->getLatitude();
                $longitude = $endereco[0]->getGeometry()->getLocation()->getLongitude();
                            
                $endereco_bd = [
                'logradouro' => $endereco[0]->getAddress()->getStreetName()->getShortName(),
                'cliente_id' => $cliente->id,
                'numero' => $endereco[0]->getAddress()->getStreetNumber()->getShortName(),
                'bairro' => $endereco[0]->getAddress()->getStreetName()->getShortName(),
                'cep' => $endereco[0]->getAddress()->getPostalCode()->getShortName(),
                'cidade' => $endereco[0]->getAddress()->getProvince()->getLongName(),
                'latitude' => $latitude,
                'longitude' => $longitude,
                'municipio' => $endereco[0]->getAddress()->getArea()->getShortName()
                ];

                $endereco = $this->cadastraEndereco($endereco_bd);
                
            }

            return redirect('home');
           
    }

    public function removeCliente($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "81",
        CURLOPT_URL => "http://localhost:81/public/api/clientes/deletar/{$id}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return redirect('home');
        }
    }

    public function cadastraCliente($row)
    {
        $postfields = [
            'nome'            => $row[0],
            'email'           => $row[1],
            'data_nascimento' => $row[2],
            'cpf'             => $row[3],
            'cep'             => $row[5]
        ];
        
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "81",
        CURLOPT_URL => "http://localhost:81/public/api/clientes/cadastrar",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postfields
        ));

        $cliente = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return json_decode($cliente);
        }
    }

    public function cadastraEndereco($endereco)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:81/public/api/enderecos/cadastrar",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $endereco
        ));

        $endereco = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return json_decode($endereco);
        }
    }

    public function atualizaCliente($endereco, $cliente)
    {
        
        $postfields = [
        'cliente_id' => $cliente->id,
        'endereco_id' => $endereco->id
        ];

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost:81/public/api/clientes/atualizar",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postfields
        ));

        $endereco = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            return json_decode($endereco);
        }
    }

}
