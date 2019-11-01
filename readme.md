## Instruções

É necessário que tenha o "**[Composer](https://getcomposer.org/)**" instalado.

Após clonar o repositório, execute o comando **"composer install"**, ao termino será nexessário renomear o arquivo **".env example"** deixe como **".env"** e configure o arquivo **".env"** com as informações de sua base de dados.

Feito isso execute o comando **"php artisan migrate"**, para que as tabelas sejam criadas.

Será necessário executar o comando **"php artisan db:seed"**, para que as cores sejam cadastradas em sua base de dados.

Execute **"php artisan serve"** uma possivel resposta será : "Laravel development server started: <http://127.0.0.1:8000>" caso ja esteja utilizando a porta "8000" execute "php artisan serve --port=8001" o qualquer outra porta desejada.

Depois de seguir os passos você poderá utilizar o sistema.

## API Implementada

Method    | EndPoint              | Description
--------- | --------------------- | ------------------------------------------------------------
POST      | api/register          | Registrar usuário (name, email, password)
POST      | api/login             | Login usuário (email, password)
GET       | api/logout            | Logout (token)
GET       | api/user              | Detalhes (token)
GET       | api/products          | Lista de produtos cadastrados
GET       | api/products/{id}     | Detalhes de produto específico
POST      | api/products          | Inserir novo produto (name, description, price, quantity, (color_id : opcional))
PUT       | api/products/{id}     | Editar produto
DELETE    | api/products/{id}     | Deletar produto
GET       | api/colors            | Lista de cores cadastradas



