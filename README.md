# SMART TRACKER 

O objetivo do sistema é gerenciar as compras dos clientes, armazenando todas as informações relacionadas a essas transações. 
O sistema permite registrar compras que podem ser pagas à vista ou parceladas, dependendo do valor total da compra. Dessa forma, 
o sistema facilita o controle financeiro, oferecendo opções de pagamento flexíveis e garantindo 
que todas as compras sejam devidamente monitoradas e gerenciadas.


# Como rodar o sistema

>## Pré-requisitos

* PHP v7 ou superior
* XAMP ou WAMPSERVER
* COMPOSER v2.7.8

>## Passos para rodar

### Configuração o ambiente
O projeto disponibiliza um arquivo de exemplo .env.example, que serve como modelo para configurar o ambiente necessário 
para rodar a aplicação. Para facilitar a execução da aplicação localmente, basta copiar o conteúdo do arquivo 
.env.example e criar um novo arquivo .env com esse conteúdo

### Gerar a chave da applicação
````bash
    php artisan key:generate
````
### Migrar o Banco de dados
````bash
    php artisan migrate
````
### Rodar o Servidor de Desenvolvimento:
````bassh
    php artisan serve
````
Após seguir os passos acima, você pode acessar 
a aplicação no navegador através da URL http://localhost:8000/customer/create.
