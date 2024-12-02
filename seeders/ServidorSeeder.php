<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servidor;

class ServidorSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/servidores.php');

        foreach ($servidores as $servidor) {
            Servidor::factory(1)->create($servidor);
        }
    }
}
