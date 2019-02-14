<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
     // propriedade para ser preenchida
   protected $fillable = [
        'title',
        'name',
        'description',
        'copyright',
        'keywords',
        'logo',
        'foneA',
        'foneB',
        'localizacao',
        'cor_title',
        'cor_background',
        'cor_texto'
    ];
}
