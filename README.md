## Instalação da API

- É necessario criar um Banco de Dados MySQL com o nome nerus.
- Rodar o comando "php artisan migrate" para que as tabelas sejam criadas no Banco de Dados.
- Após realizar os passos anteriores, precisamos inicializar a API em nosso ambiente de desenvolvimento local. Para isso precisamos rodar o comando "php artisan serve --port=8001" para que assim a API fique na porta 8001, com isso poderemos acessar sem problemas diretamente do nosso Front-End, pois nosso Front-End ficara iniciado na porta padrão do Laravel que nesse caso é a 8000.

## Acessando os Endpoints da API

### GET
- /api/produto - traz os produtos do Banco de Dados, utilizando paginação.

### POST
- /api/produto - recebe os dados do produto que está sendo cadastrado e salva no Banco de Dados.
- /api/produto/deletar - recebe o ID do produto a ser deletado.
