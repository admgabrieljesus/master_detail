<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemResultado extends Model
{
    /** @use HasFactory<\Database\Factories\ItemResultadoFactory> */
    use HasFactory;

    protected $table = 'item_resultados';

    protected $fillable = [
        'avaliacao_id',
        'descricao',
        'peso',
        'gestor_escala_id',
    ];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'avaliacao_id');
    }
}
