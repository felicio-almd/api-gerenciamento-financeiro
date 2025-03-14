# API de Gerenciamento Financeiro

API backend desenvolvida com Laravel 11+ para suportar um sistema de gerenciamento de movimentações financeiras.

## Visão Geral

Esta API faz parte de um projeto Fullstack que permite gerenciar movimentações financeiras de forma eficiente. O sistema é composto por:

- **Backend**: API RESTful desenvolvida em Laravel 11+
- **Frontend**: Interface de usuário construída com Vue 3 (em repositório separado)

# Features
- É possivel registrar seu próprio usuario e logar com o acesso dele
- Cada usuario tem suas próprias movimentações (as tabelas são relacionadas), as categorias são gerais para todos

## Requisitos

- PHP 8.2+
- Composer
- MySQL 8.0+
- Necessário rodar o mysql!!

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/felicio-almd/api-gerenciamento-financeiro.git
   cd api-gerenciamento-financeiro
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

5. ESTEJA COM O BANCO DE DADOS ATIVADO e Configure o banco de dados no arquivo `.env`

6. Execute as migrações (se preferir direto):
    ```bash
   php artisan migrate --seed
   ```
    
6.1 Execute as migrações:
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

### Movimentações
- `id` - UUID, chave primária
- `type` - Tipo do Movimentação ('in' para entrada, 'out' para saída)
- `value` - Valor do Movimentação
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

### Movimentações

- `GET /api/movements` - Lista todos as movimentações
- `GET /api/movements/{id}` - Obtém detalhes de uma movimentação
- `POST /api/movements` - Cria uma novo movimentação
- `PUT /api/movements/{id}` - Atualiza uma movimentação existente
- `DELETE /api/movements/{id}` - Remove uma movimentação

#### Exemplo de Requisição para Criar Movimentação
```json
{
  "type": "in",
  "value": 1500.50,
  "user_id": "01jp46awbx12e0rnst3ea6hpm8",
  "category_id": "01jp46awbx12e0rnst3ea6hpm8",
  "description": "Pagamento de salário mensal"
}
```

---

## 📝 Made by Felicio
