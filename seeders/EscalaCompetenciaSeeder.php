<?php

namespace Database\Seeders;

use App\Models\EscalaCompetencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscalaCompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/escalacompetencias.php');

        foreach ($escalacompetencias as $escalacompetencia) {
            EscalaCompetencia::factory(1)->create($escalacompetencia);
        }
    }
}
