# lamp1
sudo subscription-manager register

sudo subscription-manager attach

sudo yum module install -y container-tools

podman build -t httpd-php:1.0 .
podman images
podman pod create --name my-lamp -p 8080:80

podman run -d --read-only --rm --pod my-lamp -v /home/juancvilla/lamp1/html/:/var/www/html/ --tmpfs /var/log --tmpfs /var/tmp --name mydevcontainer httpd-php:1.0
sudo semanage fcontext -a -t container_file_t "/home/juancvilla/lamp1/html(/.*)?"
sudo restorecon -R -v /home/juancvilla/lamp1/html
curl localhost:8080/index.php

podman login registry.redhat.io

podman pull registry.redhat.io/rhel8/mariadb-103

podman run -d --rm --pod my-lamp --name mariadb_database -e MYSQL_USER=user -e MYSQL_PASSWORD=pass -e MYSQL_DATABASE=db rhel8/mariadb-103
podman ps -a --pod
curl localhost:8080/index.php
podman pod ps --ctr-status
podman pod stop my-lamp

