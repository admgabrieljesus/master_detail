<?php

// app/Http/Resources/CompraResource.php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\DTOs\CompraDto;

class CompraResource extends JsonResource
{
    public function toArray($request)
    {
        return new CompraDto(
            $this->id,
            $this->nome,
            $this->data,
            $this->valor_total,
            $this->itens // Adapte conforme sua relação entre Compra e Itens
        );
    }
}
