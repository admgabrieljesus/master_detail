<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisao;

class DivisaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/divisoes.php');

        foreach ($divisoes as $divisao) {
            Divisao::factory(1)->create($divisao);
        }
    }
}
