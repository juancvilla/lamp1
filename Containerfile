FROM registry.access.redhat.com/ubi8/ubi-init
MAINTAINER juancvilla@gmail.com
RUN yum install -y php php-apcu php-intl php-mbstring php-xml php-json php-mysqlnd crontabs cronie iputils net-tools; yum clean all
RUN systemctl enable httpd.service
ENTRYPOINT ["/sbin/init"]
CMD ["/sbin/init"]
