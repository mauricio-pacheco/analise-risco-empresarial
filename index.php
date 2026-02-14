<?php

/**
 * Ponto de entrada do sistema.
 * Simula execução corporativa com documento de exemplo.
 */

require_once 'autoload.php';

use Infraestrutura\Anonimizador;
use Infraestrutura\ExtratorTextual;
use Dominio\{
    AvaliadorFinanceiro,
    AvaliadorJuridico,
    AvaliadorTrabalhista,
    AvaliadorReputacional,
    AvaliadorOperacional,
    MotorDeClassificacao,
    AnalisadorCorporativo
};

// Documento fictício
$documento = "
CNPJ 12.345.678/0001-90
A empresa possui processo trabalhista.
Relatório indica endividamento elevado.
Houve escândalo público recente.
";

// Remove dados sensíveis antes da análise
$anonimizador = new Anonimizador();
$textoSeguro = $anonimizador->anonimizar($documento);

// Instancia orquestrador com injeção de dependências
$analisador = new AnalisadorCorporativo(
    new ExtratorTextual(),
    [
        'financeiro' => new AvaliadorFinanceiro(),
        'juridico' => new AvaliadorJuridico(),
        'trabalhista' => new AvaliadorTrabalhista(),
        'reputacional' => new AvaliadorReputacional(),
        'operacional' => new AvaliadorOperacional(),
    ],
    new MotorDeClassificacao()
);

// Executa análise
$resultado = $analisador->analisar($textoSeguro);

echo "Classificação Final: {$resultado['nivel']}\n";
echo "Score Final: {$resultado['score']}\n";
echo "Resumo Executivo:\n";
foreach ($resultado['resumo'] as $indice => $linha) {
    echo "[" . $indice . "] => " . $linha . PHP_EOL;
}
