<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class remedio extends Model
{
    protected $fillable = ['nome', 'valor', 'urlImagem', 'descricao', 'estoque', 'updated_a', 'created_at'];
   	protected $guarded = [];

   	/*Referencia de https://www.youtube.com/watch?v=uAqoAzhxwjU*/
   //Faz a Filtragem no banco e retorna o resultado
   public function search(Array $data){
        return  $this->where(function($query) use ($data){
            if(isset($data['nome'])){
                $query->where('nome', $data['nome']);
            }
        })->paginate(10);
        //->toSql();dd($clientes);
        
    }
}
