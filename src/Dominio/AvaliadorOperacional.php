<?php
namespace Dominio;

use Contratos\AvaliadorDimensaoInterface;

/**
 * Avalia risco operacional.
 *
 * Neste exemplo simplificado, assumimos risco baixo
 * caso não existam indicadores explícitos.
 *
 * Pode futuramente considerar:
 * - Histórico de atraso
 * - Multas contratuais
 * - Falhas técnicas
 */
class AvaliadorOperacional implements AvaliadorDimensaoInterface
{
    public function avaliar(array $dados): float
    {
        // Como ainda não temos indicadores operacionais específicos,
        // retornamos risco base mínimo.
        return 2;
    }
}
