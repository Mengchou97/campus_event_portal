FROM php:8.4-apache

# Mod Rewrite + Proxy modules (proxy modules needed for Vite dev server passthrough)
RUN a2enmod rewrite proxy proxy_http

# Install required Linux development libraries (Added libzip-dev)
RUN apt-get update && apt-get install -y \
    netcat-openbsd \
    git \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure and install PHP Extensions (Added zip extension)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gettext intl pdo_mysql gd zip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Proxy Vite's dev-server asset paths through to port 5173 (same container)
RUN sed -i '/<\/VirtualHost>/i \
    ProxyPass /@vite http://127.0.0.1:5173/@vite\n\
    ProxyPassReverse /@vite http://127.0.0.1:5173/@vite\n\
    ProxyPass /@fs http://127.0.0.1:5173/@fs\n\
    ProxyPassReverse /@fs http://127.0.0.1:5173/@fs\n\
    ProxyPass /@id http://127.0.0.1:5173/@id\n\
    ProxyPassReverse /@id http://127.0.0.1:5173/@id\n\
    ProxyPass /resources http://127.0.0.1:5173/resources\n\
    ProxyPassReverse /resources http://127.0.0.1:5173/resources\n\
    ProxyPass /node_modules http://127.0.0.1:5173/node_modules\n\
    ProxyPassReverse /node_modules http://127.0.0.1:5173/node_modules' \
    /etc/apache2/sites-available/000-default.conf

# Get NodeJS
COPY --from=node:23.10.0 /usr/local /usr/local

# Example snippet in Dockerfile
COPY . /var/www/html
RUN ln -s /var/www/html/storage/app/public /var/www/html/public/storage   

COPY . /var/www/html

WORKDIR /var/www/html
