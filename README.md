# Autenticação

Para acessar as funcionalidades da API, é necessário autenticar-se. A autenticação é feita utilizando o sistema de tokens do Sanctum.
Registro de Usuário

Rota: POST /register

Esta rota permite que novos usuários se registrem na aplicação.
Parâmetros

    firstName (obrigatório): Primeiro nome do usuário.
    lastName (opcional): Sobrenome do usuário.
    email (obrigatório): Endereço de e-mail do usuário.
    password (obrigatório): Senha do usuário.

## Login de Usuário

Rota: POST /login

Esta rota permite que usuários registrados façam login na aplicação.
Parâmetros

    email (obrigatório): Endereço de e-mail do usuário registrado.
    password (obrigatório): Senha do usuário.

## Logout de Usuário

Rota: POST /logout

Esta rota permite que usuários autenticados façam logout da aplicação.

# Contatos

As operações CRUD (Criar, Ler, Atualizar e Deletar) para os contatos são protegidas por autenticação. Os contatos estão associados a usuários específicos.

## Listar Contatos

Rota: GET /contatos

Esta rota retorna uma lista de todos os contatos associados ao usuário autenticado.

## Criar Contato

Rota: POST /contatos

Esta rota permite que o usuário autenticado crie um novo contato.
Parâmetros

    user_id (obrigatório): ID do usuário que está criando o contato.
    first_name (obrigatório): Primeiro nome do contato.
    last_name (opcional): Sobrenome do contato.
    phone_number (obrigatório): Número de telefone do contato.
    email (opcional): Endereço de e-mail do contato.

## Exibir Detalhes do Contato

Rota: GET /contato/{contato}

Esta rota retorna os detalhes de um contato específico, identificado pelo seu ID.

## Atualizar Contato

Rota: PUT /contatos/{contato}

Esta rota permite que o usuário autenticado atualize as informações de um contato existente.
Parâmetros

    first_name (obrigatório): Novo primeiro nome do contato.
    last_name (opcional): Novo sobrenome do contato.
    phone_number (obrigatório): Novo número de telefone do contato.
    email (opcional): Novo endereço de e-mail do contato.

## Deletar Contato

Rota: DELETE /contatos/{contato}

Esta rota permite que o usuário autenticado exclua um contato existente.

# Exemplos de Uso

## Registro de Usuário

POST /register
{
"firstName": "John",
"lastName": "Doe",
"email": "john@example.com",
"password": "password123"
}

## Login de Usuário

POST /login

`{
"email": "john@example.com",
"password": "password123"
}`

## Criar Contato

POST /contatos
{
"user_id": 1,
"first_name": "Jane",
"last_name": "Doe",
"phone_number": "123456789",
"email": "jane@example.com"
}

## Listar Contatos

GET /contatos

## Exibir Detalhes do Contato

GET /contato/1

## Atualizar Contato

PUT /contatos/1
{
"first_name": "Jane",
"last_name": "Smith",
"phone_number": "987654321",
"email": "jane@example.com"
}

## Deletar Contato

DELETE /contatos/1

Esta é a documentação completa da API de Agenda de Contatos. Utilize as rotas e parâmetros conforme descrito para interagir com a aplicação de forma eficaz.
