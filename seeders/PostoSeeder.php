<?php

namespace Database\Seeders;

use App\Models\Posto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/postos.php');

        foreach ($postos as $posto) {
            Posto::factory(1)->create($posto);
        }
    }
}
