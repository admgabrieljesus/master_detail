<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Situacao;

class SituacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/situacoes.php');

        foreach ($situacoes as $situacao) {
            Situacao::factory(1)->create($situacao);
        }
    }
}
