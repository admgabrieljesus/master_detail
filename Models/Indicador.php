<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Indicador extends Model
{
    use HasFactory;

    protected $table = 'indicadores';
         /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'competencia_id',
    ];

    /**
     * Get the categoria that owns the tipo.
     */
    public function competencia(): BelongsTo
    {
        return $this->belongsTo(Competencia::class);
    }
}
