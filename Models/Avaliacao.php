<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    /** @use HasFactory<\Database\Factories\AvaliacaoFactory> */
    use HasFactory;

    protected $table = 'avaliacoes';

    protected $fillable = [
        'data_emissao', 
        'data_devolucao',
        'tipo_id',
        'servidor_id',
        'gestor_id',
        'referencia_id',
        'carreira_id',
        'area_id',
        'especialidade_id',
        'lotacao_id',
        'situacao_id',
        'divisao_id',
        'funcao_id',
        'posto_id',
        'fase',
        'periodo_inicial',
        'periodo_final',
        'data_gestor',
        'data_servidor',
        'status',
    ];
    
    public function itens_avaliacao()
    {
        return $this->hasMany(ItemAvaliacao::class, 'avaliacao_id');
    }

    public function itens_resultado()
    {
        return $this->hasMany(ItemResultado::class, 'avaliacao_id');
    }

    public function servidor()
    {
        return $this->belongsTo(Servidor::class, 'servidor_id');
    }

    public function gestor()
    {
        return $this->belongsTo(Servidor::class, 'gestor_id');
    }

    public function lotacao()
    {
        return $this->belongsTo(Lotacao::class, 'lotacao_id');
    }

    public function posto()
    {
        return $this->belongsTo(Posto::class, 'posto_id');
    }

    public function referencia()
    {
        return $this->belongsTo(Referencia::class, 'referencia_id');
    }

    public function funcao()
    {
        return $this->belongsTo(Funcao::class, 'funcao_id');
    }
}
