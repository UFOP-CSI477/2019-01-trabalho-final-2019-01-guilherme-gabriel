<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    protected $fillable = ['idRemedio', 'nome', 'formaPagamento', 'endereco', 'numero', 'estado', 'cidade' , 'updated_a', 'created_at'];
   	protected $guarded = [];
}
