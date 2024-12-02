<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Competencia;

class CompetenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/competencias.php');

        foreach ($competencias as $competencia) {
            Competencia::factory(1)->create($competencia);
        }
    }
}
