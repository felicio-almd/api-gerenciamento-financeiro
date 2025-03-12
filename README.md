# API de Gerenciamento Financeiro

API backend desenvolvida com Laravel 11+ para suportar um sistema de gerenciamento de movimentações financeiras.

## Visão Geral

Esta API faz parte de um projeto Fullstack que permite gerenciar movimentações financeiras de forma eficiente. O sistema é composto por:

- **Backend**: API RESTful desenvolvida em Laravel 11+
- **Frontend**: Interface de usuário construída com Vue 3 (em repositório separado)

## Requisitos

- PHP 8.2+
- Composer
- MySQL 8.0+ ou PostgreSQL 13+
- Extensões PHP: BCMath, Ctype, Fileinfo, JSON, Mbstring, OpenSSL, PDO, Tokenizer, XML

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   cd nome-do-repositorio
   ```

2. Instale as dependências:
   ```bash
   composer install
   ```

3. Crie o arquivo de configuração:
   ```bash
   cp .env.example .env
   ```

4. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

5. Configure o banco de dados no arquivo `.env`

6. Execute as migrações:
   ```bash
   php artisan migrate
   ```

7. (Opcional) Popule o banco com dados de exemplo:
   ```bash
   php artisan db:seed
   ```

8. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

## Estrutura do Banco de Dados

### Categorias
- `id` - UUID, chave primária
- `name` - Nome da categoria
- Timestamps (created_at, updated_at)

### Movimentos
- `id` - UUID, chave primária
- `type` - Tipo do movimento ('in' para entrada, 'out' para saída)
- `value` - Valor do movimento
- `category_id` - Referência à categoria
- `description` - Descrição do movimento (máx. 255 caracteres)
- Timestamps (created_at, updated_at)

## Endpoints da API

### Categorias

- `GET /api/categories` - Lista todas as categorias
- `GET /api/categories/{id}` - Obtém detalhes de uma categoria
- `POST /api/categories` - Cria uma nova categoria
- `PUT /api/categories/{id}` - Atualiza uma categoria existente
- `DELETE /api/categories/{id}` - Remove uma categoria

#### Exemplo de Requisição para Criar Categoria
```json
{
  "name": "Salário"
}
```

### Movimentos

- `GET /api/movements` - Lista todos os movimentos
- `GET /api/movements/{id}` - Obtém detalhes de um movimento
- `POST /api/movements` - Cria um novo movimento
- `PUT /api/movements/{id}` - Atualiza um movimento existente
- `DELETE /api/movements/{id}` - Remove um movimento

#### Exemplo de Requisição para Criar Movimento
```json
{
  "type": "in",
  "value": 1500.50,
  "category_id": "01jp46awbx12e0rnst3ea6hpm8",
  "description": "Pagamento de salário mensal"
}
```

## Validação

A API implementa validações rigorosas para garantir a integridade dos dados:

- Tipos de moviment