<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidade;

class EspecialidadeSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/especialidades.php');

        foreach ($especialidades as $especialidade) {
            Especialidade::factory(1)->create($especialidade);
        }
    }
}
