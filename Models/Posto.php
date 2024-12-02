<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posto extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'categoria_id',
    ];

     /**
     * Get the categoria that owns the posto.
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Get the postos for the categoria.
     */
    public function competencias(): HasMany
    {
        return $this->hasMany(Competencia::class)->chaperone();
    }

    /**
     *
     */
    public function lotacoes(): BelongsToMany
    {
        return $this->belongsToMany(Lotacao::class, 'lotacao_postos', 'posto_id', 'lotacao_id');
    }
}
