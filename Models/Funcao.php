<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    /** @use HasFactory<\Database\Factories\FuncaoFactory> */
    use HasFactory;

    protected $table = 'funcoes';
}
