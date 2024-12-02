<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Avaliacao;
use App\Models\ItensAvaliacao;
use App\Models\Competencia;
use App\Models\Indicador;

class GenerateItemAvaliacao extends Command
{
    protected $signature = 'generate:item-avaliacao {avaliacoes*}';
    protected $description = 'Gera itens de avaliação com base nas regras especificadas';

    public function handle()
    {
        $avaliacoes = $this->argument('avaliacoes');
        
        foreach ($avaliacoes as $avaliacaoId) {
            $avaliacao = Avaliacao::find($avaliacaoId);

            if (!$avaliacao) {
                $this->error("Avaliação com ID $avaliacaoId não encontrada.");
                continue;
            }

            $itensAvaliacao = [];
            $this->info("Gerando itens para Avaliação ID: $avaliacaoId");

            // 1. Competências de estágio sem indicadores (Referencia_ID começa com A)
            if (str_starts_with($avaliacao->referencia->nome, 'A')) {
                $competencias = Competencia::where('posto_id', 3)->take(5)->get();
                foreach ($competencias as $competencia) {
                    $itensAvaliacao[] = [
                        'AVALIACAO_ID' => $avaliacaoId,
                        'COMPETENCIA_ID' => $competencia->id,
                        'INDICADOR_ID' => null,
                        'gestor_escala_id' => 1,
                        'servidor_escala_id'=> 1,
                    ];
                }
            }

            // 2. Competências organizacionais com 4 indicadores
            $competenciasOrganizacionais = Competencia::where('posto_id', 1)->take(5)->get();
            foreach ($competenciasOrganizacionais as $competencia) {
                $indicadores = Indicador::where('competencia_id', $competencia->id)->take(4)->get();
                foreach ($indicadores as $indicador) {
                    $itensAvaliacao[] = [
                        'AVALIACAO_ID' => $avaliacaoId,
                        'COMPETENCIA_ID' => $competencia->id,
                        'INDICADOR_ID' => $indicador->id,
                        'gestor_escala_id' => 1,
                        'servidor_escala_id'=> 1,
                    ];
                }
            }

            // 3. Competências gerenciais com 4 indicadores (apenas para Função gerencial)
            //if ($this->isGerencial($avaliacao->FUNCAO_ID)) {
            if ($avaliacao->funcao->gestor == 1) {
                $competenciasGerenciais = Competencia::where('posto_id', 2)->take(5)->get();
                foreach ($competenciasGerenciais as $competencia) {
                    $indicadores = Indicador::where('competencia_id', $competencia->id)->take(4)->get();
                    foreach ($indicadores as $indicador) {
                        $itensAvaliacao[] = [
                            'AVALIACAO_ID' => $avaliacaoId,
                            'COMPETENCIA_ID' => $competencia->id,
                            'INDICADOR_ID' => $indicador->id,
                            'gestor_escala_id' => 1,
                            'servidor_escala_id'=> 1,
                        ];
                    }
                }
            }

            // 4. Competências técnicas dependentes do Posto_ID
            $competenciasTecnicas = Competencia::where('posto_id', $avaliacao->posto_id)
                ->take(5)
                ->get();
            foreach ($competenciasTecnicas as $competencia) {
                    $itensAvaliacao[] = [
                        'AVALIACAO_ID' => $avaliacaoId,
                        'COMPETENCIA_ID' => $competencia->id,
                        'INDICADOR_ID' => null,
                        'gestor_escala_id' => 1,
                        'servidor_escala_id'=> 1,
                    ];
            }

            
            // Salvar itens na tabela
            ItensAvaliacao::insert($itensAvaliacao);
            $this->info("Itens para Avaliação ID $avaliacaoId gerados com sucesso.");
        }
    }

    
}
