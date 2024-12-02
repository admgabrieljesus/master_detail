<?php

namespace Database\Seeders;

use App\Models\EscalaResultado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EscalaResultadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/escalaresultados.php');

        foreach ($escalaresultados as $escalaresultado) {
            EscalaResultado::factory(1)->create($escalaresultado);
        }
    }
}
