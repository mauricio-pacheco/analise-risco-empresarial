<?php
namespace Contratos;

/**
 * Interface que define o contrato para qualquer avaliador de dimensão.
 *
 * Garante que cada dimensão (financeira, jurídica, etc.)
 * implemente o mesmo padrão de avaliação.
 */
interface AvaliadorDimensaoInterface
{
    /**
     * Recebe os dados estruturados extraídos do documento
     * e retorna uma nota de 0 a 10.
     *
     * @param array $dados
     * @return float
     */
    public function avaliar(array $dados): float;
}
