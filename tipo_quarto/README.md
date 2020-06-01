** Pacotes instalados: php-pecl-http, php-pear, php-pecl-http, php7.2-json, libapache2-mod-php7.2, apache2, mysql-server

Acesso o banco mysql -u root

Crieo usuário com o comando abaixo CREATE USER 'hotel_owner'@'localhost' IDENTIFIED BY 'hotel_owner123';

Adicione as permissões com os comandos abaixo: GRANT ALL PRIVILEGES ON * . * TO 'hotel_owner'@'localhost';

Rodando sript do banco via cmd ou terminal linux. (Tem que estar no diretorio que esta o script para facilitar) mysql -u hotel_owner -p < tbl_sample.sql

Edit a file, create a new file, and clone from Bitbucket in under 2 minutes

When you're done, you can delete the content in this README and update the file with details for others getting started with your repository.

We recommend that you open this README in another tab as you perform the tasks below. You can watch our video for a full demo of all the steps in this tutorial. Open the video in a new tab to avoid leaving Bitbucket.
