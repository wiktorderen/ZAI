FROM mariadb:latest
RUN apt update
RUN apt install php php-cli php-fpm php-json php-common php-mysql php-zip php-gd php-mbstring php-curl php-xml php-pear php-bcmath -y
CMD ["mysqld"]
EXPOSE 3306