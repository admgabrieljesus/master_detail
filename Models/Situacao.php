<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    /** @use HasFactory<\Database\Factories\SituacaoFactory> */
    use HasFactory;

    protected $table = 'situacoes';
}
