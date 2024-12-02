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
            /*
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
            FuncaoSeeder::class,s
            SituacaoSeeder::class,
            DivisaoSeeder::class,
            CarreiraSeeder::class,
            AreaSeeder::class,
            EspecialidadeSeeder::class,
            ReferenciaSeeder::class,
            ServidorSeeder::class,
        */
    ]);

        Avaliacao::factory(100)
        ->create()
        ->each(function ($avaliacao) {
            // IDs fixos de competências (1 a 15)
            $competenciasFixas = Competencia::whereIn('id', range(1, 15))->get();

            // Competências baseadas no posto_id da avaliação
            $competenciasPosto = Competencia::where('posto_id', $avaliacao->posto_id)
                ->inRandomOrder()
                ->limit(5)
                ->get();

            // Combinar as competências
            $competencias = $competenciasFixas->merge($competenciasPosto);

            // Criar itens de avaliação para essas competências
            $competencias->each(function ($competencia) use ($avaliacao) {
                ItemAvaliacao::create([
                    'avaliacao_id' => $avaliacao->id,
                    'competencia_id' => $competencia->id,
                    'indicador_id' => $competencia->indicadores()->inRandomOrder()->value('id'),
                    'gestor_escala_id' => \App\Models\EscalaCompetencia::inRandomOrder()->value('id'),
                    'servidor_escala_id' => \App\Models\EscalaCompetencia::inRandomOrder()->value('id'),
                ]);
            });

            // Criar 5 itens de resultado para cada avaliação
            $avaliacao->itens_resultado()->saveMany(
                ItemResultado::factory(5)->make()
            );
        });
        
     
    }
}

