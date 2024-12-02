<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Funcao;

class FuncaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/funcoes.php');

        foreach ($funcoes as $funcao) {
            Funcao::factory(1)->create($funcao);
        }
    }
}
