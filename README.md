# Sistema de Avaliação de Risco Corporativo

## Visão Geral

Este projeto implementa um motor determinístico de avaliação de risco empresarial baseado em análise documental estruturada.

A aplicação simula um processo de due diligence automatizado para apoiar decisões de contratação em cenários de alto impacto financeiro, consolidando múltiplos indicadores de risco em um score ponderado e classificando a empresa como:

- Baixo risco  
- Médio risco  
- Alto risco  

A decisão é transparente, reproduzível e auditável.

---

## Objetivo

Demonstrar:

- Arquitetura orientada a domínio
- Aplicação prática dos princípios SOLID
- Separação clara de responsabilidades
- Baixo acoplamento e alta coesão
- Processamento estruturado de dados textuais
- Consolidação de score multidimensional
- Estrutura extensível para evolução futura

---

## Arquitetura

A aplicação está organizada em três camadas principais:

### Contratos

Contém interfaces que definem os contratos do sistema.  
Permite desacoplamento e extensibilidade sem modificar o núcleo da aplicação.

### Domínio

Contém as regras de negócio puras:

- Avaliadores por dimensão
- Motor de classificação
- Orquestrador principal da análise

Essa camada não depende da infraestrutura.

### Infraestrutura

Contém implementações técnicas:

- Extração textual de indicadores
- Anonimização de dados sensíveis

Pode ser substituída sem impactar a lógica de negócio.

---

## Modelo de Avaliação

O sistema considera cinco dimensões de risco:

- Financeiro (30%)
- Jurídico (25%)
- Trabalhista (20%)
- Reputacional (15%)
- Operacional (10%)

Cada dimensão retorna uma nota de 0 a 10.

O score final é calculado por média ponderada.

Classificação final:

- 0.00 a 2.99 → Baixo risco
- 3.00 a 5.99 → Médio risco
- 6.00 a 10.00 → Alto risco

A decisão é determinística e pode ser reproduzida com os mesmos dados de entrada.

---

## Requisitos

- PHP 8.0 ou superior
- Terminal ou Prompt de Comando

Não utiliza frameworks ou bibliotecas externas.

---

## Como Executar

### 1. Clonar o repositório

```bash
git clone https://github.com/mauricio-pacheco/analise-risco-empresarial.git
