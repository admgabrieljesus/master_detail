<?php

namespace Database\Seeders;

use App\Models\LotacaoPosto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotacaoPostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/lotacoespostos.php');

        foreach ($lotacoespostos as $lotacaoposto) {
            LotacaoPosto::factory(1)->create($lotacaoposto);
        }
    }
}
