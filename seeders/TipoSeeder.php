<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo;


class TipoSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/tipos.php');

        foreach ($tipos as $tipo) {
            Tipo::factory(1)->create($tipo);
        }
    }
}
