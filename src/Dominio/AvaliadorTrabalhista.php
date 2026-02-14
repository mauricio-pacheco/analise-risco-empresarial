<?php
namespace Dominio;

use Contratos\AvaliadorDimensaoInterface;

/**
 * Avalia risco trabalhista com base na quantidade
 * de processos trabalhistas identificados.
 *
 * Quanto maior o número, maior o risco.
 */
class AvaliadorTrabalhista implements AvaliadorDimensaoInterface
{
    public function avaliar(array $dados): float
    {
        // Cada processo impacta proporcionalmente
        $score = $dados['processos_trabalhistas'] * 1.5;

        // Limita a nota máxima em 10
        return min($score, 10);
    }
}
