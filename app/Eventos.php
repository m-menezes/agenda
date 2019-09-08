<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    /**
     * Array de valores para eventos da agenda
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'descricao',
        'responsavel',
        'status',
        'data_inicio',
        'data_prazo',
        'data_conclusao',
    ];
}
