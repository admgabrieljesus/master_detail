<?php

namespace Database\Seeders;

use App\Models\Indicador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/indicadores.php');

        foreach ($indicadores as $indicador) {
            Indicador::factory(1)->create($indicador);
        }
    }
}
