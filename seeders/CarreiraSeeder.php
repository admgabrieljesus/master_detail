<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carreira;

class CarreiraSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/carreiras.php');

        foreach ($carreiras as $carreira) {
            Carreira::factory(1)->create($carreira);
        }
    }
}
