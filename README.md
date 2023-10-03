# lamp1
podman build -t httpd-php:1.0 .
podman pod create --name my-pod -p 8080:80
podman run -d --read-only --rm --pod my-pod -v /var/www/html/:/var/www/html/:Z --tmpfs /var/log --tmpfs /var/tmp --name mydevcontainer httpd-php:1.0
podman login registry.redhat.io
podman pull registry.redhat.io/rhel8/mariadb-103
podman run -d --rm --pod my-pod --name mariadb_database -e MYSQL_USER=user -e MYSQL_PASSWORD=pass -e MYSQL_DATABASE=db rhel8/mariadb-103
