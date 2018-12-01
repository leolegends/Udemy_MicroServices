<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = "clientes";

    protected $fillable = [
        "nome",
        "email",
        "data_nascimento",
        "cpf",
        "endereco_id",
        "cep",
        "created_at",
        "updated_at"
    ];


    public function getEnderecos()
    {
        return $this->hasMany('App\Enderecos','cliente_id','id');
    }
    
}


