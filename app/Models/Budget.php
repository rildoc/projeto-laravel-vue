<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
     // campos do banco banco de dados
    protected $fillable = ['empresa','nome','telefone','celular','estado','cidade','cep','mensagem'];

    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['nome']) && !isset($data['empresa']) && !isset($data['estado']) && !isset($data['cidade']))
            return $this->paginate($total);

         /*
        * Para debugar você  uma variavel $results  no lugar do return
        * no lugar do paginate coloca a funcao ->toSql();
        * e dd($variavel) para fazer o debug
        */
      //  $results =
         return  $this->where(function ($query) use ($data) {
                     if (isset($data['filter'])) {
                         $filter = $data['filter'];
                         $query->where('nome', $filter);
                         $query->orwhere('empresa', 'LIKE', "%{$filter}%");
                     }

                     if (isset($data['nome']))
                        $query->where('nome', $data['nome']);


                     if (isset($data['estado']))
                        $query->where('estado', $data['estado']);


                     if (isset($data['cidade']))
                        $query->where('cidade', $data['cidade']);



                     if (isset($data['empresa'])) {
                            $empresa = $data['empresa'];
                            $query->where('empresa', 'LIKE', "%{$empresa}%");
                        }

            })->paginate($total);
              //->toSql();
          //  dd($results);
    }

    public function products()
    {
       return $this->belongsToMany(Product::class, 'budget_product');
    }
}





