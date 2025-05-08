# API de Gerenciamento Financeiro

API backend desenvolvida com Laravel 11+ para suportar um sistema de gerenciamento de movimentações financeiras.

## Visão Geral

Esta API faz parte de um projeto Fullstack que permite gerenciar movimentações financeiras de forma eficiente. O sistema é composto por:

- **Backend**: API RESTful desenvolvida em Laravel 11+
- **Frontend**: Interface de usuário construída com Vue 3 (em repositório separado)

## Features
- Registro e autenticação de usuários
- Cada usuário possui suas próprias movimentações (relacionadas por chave estrangeira)
- As categorias são compartilhadas entre todos os usuários
- Docker para containerizar a aplicação e poder ser feito o deploy

---

## ✅ Executando com Docker (Desenvolvimento) (BRANCH ADD-DOCKER)

Este projeto está preparado para rodar via Docker de forma simples e rápida.

### Pré-requisitos

- Docker e Docker Compose instalados

### Passo a passo

1. Clone o repositório:
   ```bash
   git clone https://github.com/felicio-almd/api-gerenciamento-financeiro.git
   cd api-gerenciamento-financeiro
   ```

2. Crie o arquivo de configuração do ambiente:
```bash
cp .env.example .env
```

3. Inicie os containers:
```bash
    docker-compose up -d --build
   ```

VOCE TAMBEM PODE (OPCIONAL)
4. Acesse o container da aplicação:
```bash
    docker exec -it api-gerenciamento-financeiro_app_1 bash
   ```

5. Gere a key do Laravel:
```bash
    php artisan key:generate
   ```

6.Rode as migrations (e seeds se desejar):
```bash
   php artisan migrate --seed
   ```


Configuração do Nginx
O container usa o arquivo nginx-site.conf para definir as rotas e regras do servidor web. Esse arquivo é incluído no Dockerfile e copiado para o container para servir a aplicação via porta 80 e 443.

☁️ Deployment com Render
A aplicação está publicada no Render, utilizando PostgreSQL como banco de dados.

Estratégia de Deploy
A imagem Docker é construída a partir do Dockerfile presente no projeto.

O processo de inicialização em produção é feito com o script 00-laravel-deploy.sh, responsável por:

Gerar a key da aplicação

Rodar as migrations

Cachear as configurações

Iniciar o PHP-FPM e Nginx no ambiente de produção

## CASO QUEIRA RODAR SEM DOCKER (BRANCH MAIN)

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

🛠 Arquivos importantes
Dockerfile: Define a imagem da aplicação Laravel com Nginx e PHP

docker-compose.yml: Sobe a aplicação e o banco de dados MySQL localmente

nginx-site.conf: Configuração personalizada para o Nginx servir a aplicação Laravel

00-laravel-deploy.sh: Script de boot para ambiente de produção no Render


## 📝 Made by Felicio
