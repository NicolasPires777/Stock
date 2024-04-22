Como utilizar o Stock:

Para utilizar o Stock, você deve ter um servidor local habilitado em sua máquina, já que a aplicação não está hospedada no momento. Recomendo a utilização do “xampp”, foi o aplicativo utilizado para o desenvolvimento do projeto.

Já com o servidor local hospedado na máquina que irá usar o app, faça download da versão mais recente, você poderá encontrá-la na pasta “main” deste mesmo repositório, depois de ter o app em sua versão mais recente, mova a pasta para sua pasta do servidor local, no caso do xampp será a pasta htdocs.

Para criar o banco de dados do stock, utilize o comando abaixo:

CREATE DATABASE stock;
USE stock;
CREATE TABLE usuarios ( id integer NOT NULL, nome CHAR(20) NOT NULL, senha CHAR(20) NOT NULL );
CREATE TABLE itens ( item CHAR(20) NOT NULL, marca CHAR(20) NOT NULL, quant FLOAT NOT NULL, modelo CHAR(20) NOT NULL, format CHAR(20) NOT NULL, id integer NOT NULL, setor CHAR(50) NOT NULL, FOREIGN KEY (id) REFERENCES usuarios(id) );


Com esses passos feitos, já está tudo pronto para acessar e utilizar sua aplicação na web, abra o navegador e acesse “127.0.0.1/caminho-até-stock”.

