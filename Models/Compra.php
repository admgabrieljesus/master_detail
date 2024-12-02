<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    /** @use HasFactory<\Database\Factories\CompraFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'data',
        'valor_total'
    ];

    public function itens()
    {
        return $this->hasMany(ItemCompra::class);
    }
}
