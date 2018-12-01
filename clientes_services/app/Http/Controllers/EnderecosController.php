<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Enderecos;
use Illuminate\Http\Request;

class EnderecosController extends Controller
{
    public function cadastraEnderecos(Request $data)
    {
        $endereco_bd = Enderecos::create([
            'logradouro' => $data->logradouro,
            'cliente_id' => $data->cliente_id,
            'numero'     => $data->numero,
            'bairro'     => $data->bairro,
            'cep'        => $data->cep,
            'cidade'     => $data->cidade,
            'latitude'   => $data->latitude,
            'longitude'  => $data->longitude,
            'municipio'  => $data->municipio
            ]);
    
        $cliente = Clientes::find($data->cliente_id);
        $cliente->endereco_id = $endereco_bd->id;
        $cliente->save();

        return response($endereco_bd, 201);

    }
}
