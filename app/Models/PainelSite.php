<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PainelSite extends Model
{
   // propriedade para ser preenchida
   protected $fillable = [
        'title',
        'nome',
        'description',
        'copyright',
        'keywords',
        'logo',
        'foneA',
        'foneB',
        'location',
        'desc_pagamento',
        'imagem_pagamento',
        'cor_title',
        'cor_background',
        'cor_texto'
    ];
}
