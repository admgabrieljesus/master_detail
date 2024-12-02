<?php

namespace Database\Seeders;

use App\Models\Lotacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/lotacoes.php');

        foreach ($lotacoes as $lotacao) {
            Lotacao::factory(1)->create($lotacao);
        }
    }
}
