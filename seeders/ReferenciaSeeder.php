<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Referencia;

class ReferenciaSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/referencias.php');

        foreach ($referencias as $referencia) {
            Referencia::factory(1)->create($referencia);
        }
    }
}
