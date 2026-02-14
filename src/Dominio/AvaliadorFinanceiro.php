<?php
namespace Dominio;

use Contratos\AvaliadorDimensaoInterface;

/**
 * Avalia risco financeiro com base em indicadores extraídos.
 *
 * Regra:
 * - Endividamento elevado aumenta risco significativamente.
 * - Inadimplência indica alta probabilidade de default contratual.
 */
class AvaliadorFinanceiro implements AvaliadorDimensaoInterface
{
    public function avaliar(array $dados): float
    {
        $score = 0;

        if ($dados['endividamento_alto']) {
            $score += 7;
        }

        if ($dados['inadimplencia']) {
            $score += 8;
        }

        // Normaliza limite máximo para 10
        return min($score / 10, 10);
    }
}
