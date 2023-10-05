# lamp1
Example with rootless podman run --rm

sudo subscription-manager register

sudo subscription-manager attach

sudo yum module install -y container-tools

sudo podman build -t httpd-php:1.0 .

sudo podman images

sudo podman pod create --name my-lamp -p 8080:80

sudo podman run -d --read-only --restart unless-stopped --pod my-lamp -v /home/juancvilla/lamp1/html/:/var/www/html/ --tmpfs /var/log --tmpfs /var/tmp --name mydevcontainer httpd-php:1.0

sudo semanage fcontext -a -t container_file_t "/home/juancvilla/lamp1/html(/.*)?"

sudo restorecon -R -v /home/juancvilla/lamp1/html

curl localhost:8080/index.php

sudo podman login registry.redhat.io

sudo podman pull registry.redhat.io/rhel8/mariadb-103

sudo podman run -d --restart unless-stopped --pod my-lamp --name mariadb_database -e MYSQL_USER=user -e MYSQL_PASSWORD=pass -e MYSQL_DATABASE=db rhel8/mariadb-103

sudo podman exec -it mariadb_database bash

mysql -uuser -p
use db;
CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO users(username,password) VALUES("user","pass");
exit
exit

podman ps -a --pod

curl localhost:8080/index.php

sudo podman pod ps --ctr-status

sudo podman pod stop my-lamp

sudo podman pod start my-lamp

curl localhost:8080/index.php
