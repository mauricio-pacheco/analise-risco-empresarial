<?php
namespace Dominio;

use Contratos\AvaliadorDimensaoInterface;

/**
 * Avalia risco reputacional.
 *
 * Considera escândalos públicos ou menções negativas.
 */
class AvaliadorReputacional implements AvaliadorDimensaoInterface
{
    public function avaliar(array $dados): float
    {
        if ($dados['escandalo_publico']) {
            // Escândalo público impacta fortemente reputação
            return 8;
        }

        return 1; // Risco mínimo quando não há indícios
    }
}
