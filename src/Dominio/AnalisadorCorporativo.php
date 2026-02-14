<?php
namespace Dominio;

use Contratos\ExtratorInterface;
use Contratos\AvaliadorDimensaoInterface;

/**
 * Classe orquestradora principal do sistema.
 *
 * Responsável por:
 * - Extrair dados
 * - Aplicar avaliadores por dimensão
 * - Aplicar pesos estratégicos
 * - Consolidar score final
 * - Gerar saída executiva
 *
 * Segue SRP e DIP.
 */
class AnalisadorCorporativo
{
    private ExtratorInterface $extrator;
    private array $avaliadores;
    private MotorDeClassificacao $motor;

    public function __construct(
        ExtratorInterface $extrator,
        array $avaliadores,
        MotorDeClassificacao $motor
    ) {
        $this->extrator = $extrator;
        $this->avaliadores = $avaliadores;
        $this->motor = $motor;
    }

    /**
     * Executa análise completa do documento.
     *
     * Retorna:
     * - Nível de risco
     * - Score ponderado
     * - Justificativas por dimensão
     */
    public function analisar(string $conteudo): array
    {
        $dados = $this->extrator->extrair($conteudo);

        // Pesos definidos estrategicamente
        // Financeiro possui maior impacto por risco de default
        $pesos = [
            'financeiro' => 0.30,
            'juridico' => 0.25,
            'trabalhista' => 0.20,
            'reputacional' => 0.15,
            'operacional' => 0.10
        ];

        $scoreFinal = 0;
        $justificativas = [];

        foreach ($this->avaliadores as $nome => $avaliador) {
            $nota = $avaliador->avaliar($dados);

            // Aplicação da ponderação estratégica
            $scoreFinal += $nota * $pesos[$nome];

            $justificativas[] = ucfirst($nome) . " avaliado com nota " . round($nota, 2);
        }

        $nivel = $this->motor->classificar($scoreFinal);

        return [
            'nivel' => $nivel,
            'score' => round($scoreFinal, 2),
            'resumo' => $justificativas
        ];
    }
}
