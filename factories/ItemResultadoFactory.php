<?php

namespace Database\Factories;

use App\Models\ItemResultado;
use App\Models\Avaliacao;
use App\Models\EscalaResultado;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemResultado>
 */
class ItemResultadoFactory extends Factory
{
    protected $model = ItemResultado::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'avaliacao_id' => Avaliacao::factory(),
            'descricao' => $this->faker->sentence(),
            'peso' => $this->faker->numberBetween(1, 10),
            'gestor_escala_id' => EscalaResultado::query()->inRandomOrder()->value('id'),
        ];
    }
}
