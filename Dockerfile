FROM php:7.4-apache

# Enable Apache SSL module
RUN a2enmod ssl

# Copy SSL configuration
COPY ./apache/ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Enable SSL configuration
RUN ln -s /etc/apache2/sites-available/default-ssl.conf /etc/apache2/sites-enabled/default-ssl.conf

# Update Apache default configuration to include SSL
RUN echo "IncludeOptional sites-enabled/*.conf" >> /etc/apache2/apache2.conf

# Install additional packages
RUN apt-get update && apt-get install -y vim nano

# Copy PHP configuration
COPY ./php.ini-production "$PHP_INI_DIR/php.ini"

# Generate self-signed SSL certificate
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
    -keyout /etc/ssl/private/server.key -out /etc/ssl/certs/server.crt \
    -subj "/C=AU/ST=NSW/L=City/O=Organization/OU=Unit/CN=localhost"
