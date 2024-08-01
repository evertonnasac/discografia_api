# API Laravel para Discos e Faixas

Esta é uma API construída com Laravel para gerenciar discos e faixas. A API permite criar, listar, atualizar e excluir discos e faixas, além de pesquisar discos por nome.

## Requisitos

- PHP 7.4 ou superior
- Composer
- SQLite

## Instalação

1. Clone o repositório:

`
   git clone https://github.com/evertonnasac/discografia_api
   cd seu-repositorio
`
2. Instale as dependências do Composer:
`
    composer install
`
3. Crie o arquivo .env a partir do .env.example:
`
    cp .env.example .env
`

4. Configure o banco de dados SQLite no arquivo .env:
`
    DB_CONNECTION=sqlite
    DB_DATABASE=/caminho/para/seu/database.sqlite
`

5. Crie o arquivo do banco de dados SQLite:
`
    touch database/database.sqlite
`
6. Gere a chave da aplicação:
`
    php artisan key:generate
`

7. Execute as migrações:
`
    php artisan migrate
`

8. Inicie o servidor de desenvolvimento:
`
    php artisan serve
`
