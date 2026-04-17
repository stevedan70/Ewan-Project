FROM ubuntu:latest

ENV DEBIAN_FRONTEND=noninteractive

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
		libfreetype-dev \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip

# PHP
RUN apt-get install -y nginx php-dev php-fpm php-mysql php-sqlite3 sqlite3 php-json php-xml php-bz2 php-zip php-mbstring php-curl php-pear php-gd

# NODEJS
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && apt-get update && apt-get install -y nodejs && rm -rf /var/lib/apt/lists/*
# Verify that Node.js and npm were installed correctly
RUN node -v
RUN npm -v

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Update npm packages
# RUN npm install -g npm@latest
RUN npm install -g nodemon
RUN npm install -g npm-check-updates

# Copy existing application directory contents
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Composer dependencies
RUN composer install

# nginx
COPY ./docker/nginx/conf.d/default /etc/nginx/sites-available
RUN rm /etc/nginx/sites-enabled/default
RUN ln -s /etc/nginx/sites-available/default /etc/nginx/sites-enabled

# Expose port
EXPOSE 80
EXPOSE 5173
