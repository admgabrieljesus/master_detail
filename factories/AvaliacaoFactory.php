<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use App\Models\Tipo;
use App\Models\Servidor;
use App\Models\Referencia;
use App\Models\Carreira;
use App\Models\Area;
use App\Models\Especialidade;
use App\Models\Lotacao;
use App\Models\Situacao;
use App\Models\Divisao;
use App\Models\Funcao;
use App\Models\Posto;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Avaliacao>
 */
class AvaliacaoFactory extends Factory
{

    protected $model = Avaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_emissao' => $this->faker->date(),
            'data_devolucao' => $this->faker->date(),
            'tipo_id' => Tipo::query()->inRandomOrder()->value('id'),
            'servidor_id' => Servidor::query()->inRandomOrder()->value('id'),
            'gestor_id' => Servidor::query()->inRandomOrder()->value('id'),
            'referencia_id' => Referencia::query()->inRandomOrder()->value('id'),
            'carreira_id' => Carreira::query()->inRandomOrder()->value('id'),
            'area_id' => Area::query()->inRandomOrder()->value('id'),
            'especialidade_id' => Especialidade::query()->inRandomOrder()->value('id'),
            'lotacao_id' => Lotacao::query()->inRandomOrder()->value('id'),
            'situacao_id' => Situacao::query()->inRandomOrder()->value('id'),
            'divisao_id' => Divisao::query()->inRandomOrder()->value('id'),
            'funcao_id' => Funcao::query()->inRandomOrder()->value('id'),
            'posto_id' => Posto::query()->inRandomOrder()->value('id'),
            'fase' => $this->faker->numberBetween(1, 5),
            'periodo_inicial' => $this->faker->date(),
            'periodo_final' => $this->faker->date(),
            'data_gestor' => $this->faker->date(),
            'data_servidor' => $this->faker->date(),
            'status' => $this->faker->numberBetween(0, 3),
        ];
    }
}
