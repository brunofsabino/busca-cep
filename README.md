## Consulta de CEP com Laravel 11

Este projeto é uma aplicação feita com Laravel 11 que realiza consultas de CEP usando a API ViaCEP, armazena os dados das consultas em um banco de dados e fornece uma interface para facilitar o consumo dessa funcionalidade.

## Requisitos

-   PHP 8.2 ou superior
-   Composer: 2.0 ou superior
-   GIT
-   Laravel: 11
-   Banco de Dados: MySQL, SQLite ou outro compatível

## Instalação

Siga os passos abaixo para configurar o projeto em sua máquina:

1. Clone o repositório
   `https://github.com/brunofsabino/busca-cep.git`

2. Instale as dependências
   Rode o comando para instalar as dependências do Laravel:
   `composer install`

3. Configure o arquivo `.env`
   Crie o arquivo .env baseado no exemplo fornecido:
   `cp .env.example .env`

Edite o arquivo .env e configure os dados do seu banco de dados:

````env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

4. Gere a chave da aplicação
  `php artisan key:generate`

5. Crie o banco de dados
  Certifique-se de que o banco de dados configurado no .env foi criado.

6. Execute as migrations
  Rode o comando para criar as tabelas no banco:
  `php artisan migrate`

7.Iniciar o projeto criado com Laravel:
`php artisan serve`

Acesse a aplicação no navegador em: http://127.0.0.1:8000

## Uso

A aplicação possui uma rota `/search` que aceita requisições do tipo GET para consulta de CEPs. Exemplo de uso:

## Consultar um CEP

Faça uma requisição para a seguinte URL:
`http://127.0.0.1:8000/search?cep=01001000`

-   Parâmetro: `cep` (obrigatório)
-   Resposta (exemplo):
   ```{
   "status": true,
   "data": {
   "cep": "03550-000",
   "logradouro": "Rua Colatina",
   "bairro": "Cidade Patriarca",
   "localidade": "São Paulo",
   "uf": "SP",
   "ddd": "11",
   "updated_at": "2024-12-09T20:22:58.000000Z",
   "created_at": "2024-12-09T20:22:58.000000Z",
   "id": 3
   },
   "message": "Dados retornados e salvos no banco de dados."
   }
````

## Funcionalidades

-   Consulta de CEPs via API ViaCEP.
-   Armazenamento dos dados de CEP no banco de dados.
-   Evita consultas repetidas à API (busca no banco se o CEP já foi consultado).

## Tecnologias Utilizadas

-   Laravel 11: Framework PHP para desenvolvimento web.
-   API ViaCEP: Consulta de informações de CEP.
-   Banco de Dados: MySQL (ou outro configurado no .env).

## Estrutura do Projeto

-   Routes: As rotas estão definidas no arquivo `routes/web.php`.
-   Controllers: O projeto utiliza closures na rota `/search` para consultas simples.
-   Migrations: Arquivos para criação de tabelas no banco estão em `database/migrations`

```

```
