<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competencia extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'posto_id',
    ];

    /**
     * Get the categoria that owns the posto.
     */
    public function posto(): BelongsTo
    {
        return $this->belongsTo(Posto::class);
    }

  
    /**
     * Get the postos for the categoria.
     */
    public function indicadores(): HasMany
    {
        return $this->hasMany(Indicador::class)->chaperone();
    }
}
