<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Indicador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indicador>
 */
class IndicadorFactory extends Factory
{

      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Indicador::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
