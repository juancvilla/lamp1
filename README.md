# lamp1
podman build -t httpd-php:1.0 .
podman pod create --name my-pod -p 8080:80
podman run -d --read-only --rm --pod my-pod -v /home/juancvilla/lamp1/html/:/var/www/html/:Z --tmpfs /var/log --tmpfs /var/tmp --name mydevcontainer httpd-php:1.0
