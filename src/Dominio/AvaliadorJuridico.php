<?php
namespace Dominio;

use Contratos\AvaliadorDimensaoInterface;

/**
 * Avalia risco jurídico com base em processos fiscais.
 *
 * Cada ocorrência impacta proporcionalmente.
 */
class AvaliadorJuridico implements AvaliadorDimensaoInterface
{
    public function avaliar(array $dados): float
    {
        return min($dados['processos_fiscais'] * 1.2, 10);
    }
}
