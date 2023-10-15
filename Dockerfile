FROM registry.access.redhat.com/ubi8/ubi-init
MAINTAINER juancvilla@gmail.com
RUN yum install -y php php-apcu php-intl php-mbstring php-xml php-json php-mysqlnd crontabs cronie iputils net-tools; yum clean all
RUN systemctl enable httpd.service
COPY config.php /var/www/html/config.php
COPY index.php /var/www/html/index.php
COPY info.php /var/www/html/info.php
COPY login.php /var/www/html/login.php
COPY logout.php /var/www/html/logout.php
COPY register.php /var/www/html/register.php
COPY reset-password.php /var/www/html/reset-password.php
COPY welcome.php /var/www/html/welcome.php
ENTRYPOINT ["/sbin/init"]
CMD ["/sbin/init"]
