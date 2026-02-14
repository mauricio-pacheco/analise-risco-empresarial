<?php
namespace Infraestrutura;

use Contratos\ExtratorInterface;

/**
 * Implementação concreta do extrator baseada em análise textual simples.
 *
 * Pode futuramente ser substituído por:
 * - Parser NLP
 * - Integração com APIs externas
 * - Extração via banco de dados
 *
 * Segue OCP (Open/Closed Principle).
 */
class ExtratorTextual implements ExtratorInterface
{
    public function extrair(string $conteudo): array
    {
        return [
            // Contagem de ocorrências trabalhistas
            'processos_trabalhistas' => substr_count($conteudo, 'processo trabalhista'),

            // Contagem de ocorrências fiscais/jurídicas
            'processos_fiscais' => substr_count($conteudo, 'processo fiscal'),

            // Indicador binário financeiro
            'endividamento_alto' => str_contains($conteudo, 'endividamento elevado'),

            'inadimplencia' => str_contains($conteudo, 'inadimplência'),

            // Indicador reputacional
            'escandalo_publico' => str_contains($conteudo, 'escândalo'),
        ];
    }
}
