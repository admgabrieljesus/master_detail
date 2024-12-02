<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Area;

class AreaSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/areas.php');

        foreach ($areas as $area) {
            Area::factory(1)->create($area);
        }
    }
}
