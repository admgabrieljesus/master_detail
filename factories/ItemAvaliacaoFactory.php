<?php

namespace Database\Factories;

use App\Models\ItemAvaliacao;
use App\Models\Avaliacao;
use App\Models\Competencia;
use App\Models\EscalaCompetencia;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemAvaliacao>
 */
class ItemAvaliacaoFactory extends Factory
{

    protected $model = ItemAvaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avaliacao_id' => Avaliacao::factory(),
            'competencia_id' => Competencia::query()->inRandomOrder()->value('id'),
            'indicador_id' => Competencia::query()->inRandomOrder()->value('id'),
            'gestor_escala_id' => EscalaCompetencia::query()->inRandomOrder()->value('id'),
            'servidor_escala_id' => EscalaCompetencia::query()->inRandomOrder()->value('id'),
        ];
    }
}
