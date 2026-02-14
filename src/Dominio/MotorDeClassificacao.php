<?php
namespace Dominio;

/**
 * Responsável por converter score numérico
 * em classificação executiva.
 *
 * Separação de responsabilidade garante
 * fácil alteração futura da política de decisão.
 */
class MotorDeClassificacao
{
    /**
     * Classificação determinística baseada em faixas.
     *
     * >= 6  -> Alto
     * >= 3  -> Médio
     * < 3   -> Baixo
     */
    public function classificar(float $scoreFinal): string
    {
        if ($scoreFinal >= 6) {
            return "ALTO";
        }

        if ($scoreFinal >= 3) {
            return "MÉDIO";
        }

        return "BAIXO";
    }
}
