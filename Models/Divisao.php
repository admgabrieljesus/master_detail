<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisao extends Model
{
    /** @use HasFactory<\Database\Factories\DivisaoFactory> */
    use HasFactory;

    protected $table = 'divisoes';
}
