<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemAvaliacao extends Model
{
    /** @use HasFactory<\Database\Factories\ItemAvaliacaoFactory> */
    use HasFactory;

    protected $table = 'item_avaliacoes';

    protected $fillable = [
        'avaliacao_id',
        'competencia_id',
        'indicador_id',
        'gestor_escala_id',
        'servidor_escala_id',
    ];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class, 'avaliacao_id');
    }
    
    public function competencia()
    {
        return $this->belongsTo(Competencia::class, 'competencia_id');
    }


}
