<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Avaliacao;
use App\Models\ItemAvaliacao;
use App\Models\ItemResultado;
use App\Models\Competencia;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        $this->call([
            
            CategoriaSeeder::class,
            PostoSeeder::class,
            CompetenciaSeeder::class,
            IndicadorSeeder::class,
            EscalaCompetenciaSeeder::class,
            EscalaResultadoSeeder::class,
            LotacaoSeeder::class,
            LotacaoPostoSeeder::class,
            RoleSeeder::class,
            MenuSeeder::class,
            TipoSeeder::class,
            FuncaoSeeder::class,
            SituacaoSeeder::class,
            DivisaoSeeder::class,
            CarreiraSeeder::class,
            AreaSeeder::class,
            EspecialidadeSeeder::class,
            ReferenciaSeeder::class,
            ServidorSeeder::class,
    ]);

       
        
     
    }
}

