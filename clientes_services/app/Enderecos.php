<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $table = "enderecos";

    protected $fillable = [
        "cliente_id",
        "logradouro",
        "numero",
        "complemento",
        "bairro",
        "cep",
        "cidade",
        "latitude",
        "longitude",
        "created_at",
        "updated_at"        
    ];

    public function getCliente()
    {
        return $this->hasOne('App\Clientes','id','cliente_id');
    }

}
