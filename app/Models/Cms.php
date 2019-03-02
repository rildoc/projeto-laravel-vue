<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
     // propriedade para ser preenchida
   protected $fillable = [
        'name',
        'copyright',
        'logo',
        'foneA',
        'foneB',
        'localizacao',
        'cor_background',
    ];
}
