<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lotacao extends Model
{
    use HasFactory;

    protected $table = 'lotacoes';

    /**
     *
     */
    public function postos(): BelongsToMany
    {
        return $this->belongsToMany(Posto::class, 'lotacao_postos', 'lotacao_id', 'posto_id');
    }
}
