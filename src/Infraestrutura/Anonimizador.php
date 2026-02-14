<?php
namespace Infraestrutura;

/**
 * Responsável por remover dados sensíveis antes do processamento.
 *
 * Garante conformidade com LGPD e evita exposição indevida
 * durante análises e logs.
 */
class Anonimizador
{
    /**
     * Remove CPF e CNPJ do texto.
     * Pode ser expandido para e-mails, telefones, etc.
     */
    public function anonimizar(string $conteudo): string
    {
        // Remove CPF
        $conteudo = preg_replace('/\d{3}\.\d{3}\.\d{3}\-\d{2}/', '***CPF***', $conteudo);

        // Remove CNPJ
        $conteudo = preg_replace('/\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}/', '***CNPJ***', $conteudo);

        return $conteudo;
    }
}
