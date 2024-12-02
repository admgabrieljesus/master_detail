<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensAvaliacao extends Model
{
    /** @use HasFactory<\Database\Factories\ItensAvaliacaoFactory> */
    use HasFactory;

    protected $table='item_avaliacoes';

    protected $fillable = ['avaliacao_id', 'competencia_id', 'indicador_id'];

    public function avaliacao()
    {
        return $this->belongsTo(Avaliacao::class);
    }

    public function competencia()
    {
        return $this->belongsTo(Competencia::class);
    }

    public function indicador()
    {
        return $this->belongsTo(Indicador::class);
    }
}
