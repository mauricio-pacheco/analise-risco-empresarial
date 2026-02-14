<?php
namespace Contratos;

/**
 * Interface responsável por definir o contrato de extração
 * de dados estruturados a partir de documentos textuais.
 *
 * Segue o princípio DIP (Dependency Inversion Principle),
 * permitindo múltiplas implementações (PDF, API, banco, etc).
 */
interface ExtratorInterface
{
    /**
     * Extrai indicadores relevantes do conteúdo textual.
     *
     * @param string $conteudo Documento bruto
     * @return array Dados estruturados para avaliação
     */
    public function extrair(string $conteudo): array;
}
