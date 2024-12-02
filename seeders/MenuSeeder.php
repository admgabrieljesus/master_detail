<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include( base_path() . '/database/datas/menus.php');

        foreach ($menus as $menu) {
            Menu::factory(1)->create($menu);
        }
    }
}
