<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Enderecos;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function getAllClientes()
    {
      $clientes = Clientes::all();

       return response($clientes, 201)->header('Content-Type', 'application/json');
    }

    public function getEnderecosPorDistancia()
    {
        $enderecos = app('db')->select('
        SELECT clientes.nome, l.id, l.cliente_id, l.logradouro, l.numero, l.complemento, l.bairro, l.cep, l.cidade, l.municipio, l.latitude, l.longitude, ( 3959 * acos( cos( radians(c.latitude) ) * cos( radians( l.latitude ) ) * cos( radians( l.longitude ) - radians(c.longitude) ) + sin( radians(c.latitude) ) * sin( radians( l.latitude ) ) ) ) AS distancia FROM enderecos AS l JOIN ( SELECT -23.529032 AS latitude, -46.7419535 AS longitude ) AS c LEFT JOIN clientes on clientes.id = l.cliente_id ORDER BY distancia
        ');

        return response($enderecos, 201)->header('Content-Type', 'application/json');
        
    }

    public function removeCliente($id)
    {
        
        $cliente = Clientes::find($id);
        $cliente->getEnderecos()->delete();
        $cliente->delete();
        
        $status = [
            'status' => 201,
            'msg' => 'removido com sucesso!'
        ];

        return response($status, 201);
        
    }

    public function cadastraClientes(Request $data)
    {

        $cliente = Clientes::create([
            'nome'            => $data->nome,
            'email'           => $data->email,
            'data_nascimento' => $data->data_nascimento,
            'cpf'             => $data->cpf,
            'endereco_id'     => 0,
            'cep'             => $data->cep
            ]);
    
        return response($cliente, 201);
    
    }
    
    public function atualizaEndereco(Request $data)
    {
        $cliente = Clientes::find($data->cliente_id);
        $cliente->endereco_id = $data->endereco_id;
        $cliente->save();

        $msg = [
            'status' => 201,
            'msg'    => 'cliente atualizado com sucesso!'
        ];

        return response($msg, 201);
    }

    
}
