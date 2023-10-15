# lamp1
Example with PHP Mysql Login podman run --restart unless-stopped with Dockerfile

sudo subscription-manager register

sudo subscription-manager attach

sudo yum module install -y container-tools

sudo podman build -t httpd-php:1.0 .

sudo podman images

sudo podman pod create --name my-lamp -p 8080:80

sudo podman run -d --read-only --restart unless-stopped --pod my-lamp --tmpfs /var/log --tmpfs /var/tmp --name mydevcontainer httpd-php:1.0

curl localhost:8080/index.php

sudo podman login registry.redhat.io

sudo podman pull registry.redhat.io/rhel8/mariadb-103

mkdir /home/juancvilla/lamp1/mysql
sudo chown -R 27:27 /home/juancvilla/lamp1/mysql
sudo semanage fcontext -a -t container_file_t "/home/juancvilla/lamp1/mysql(/.*)?"
sudo restorecon -Rv /home/juancvilla/lamp1/mysql

sudo podman run -d --restart unless-stopped --pod my-lamp --name mariadb_database -v /home/juancvilla/lamp1/mysql:/var/lib/mysql -e MYSQL_USER=user -e MYSQL_PASSWORD=pass -e MYSQL_DATABASE=db rhel8/mariadb-103

sudo podman exec -it mariadb_database bash

mysql -h127.0.0.1 -uuser -p

use db;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

exit
exit

podman ps -a --pod

curl localhost:8080/index.php

sudo podman pod ps --ctr-status

sudo podman pod stop my-lamp

sudo podman pod start my-lamp

curl localhost:8080/index.php
