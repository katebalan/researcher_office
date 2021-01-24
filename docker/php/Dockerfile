FROM php:7.4-fpm-buster
#FROM php:7.2-fpm
# Copy composer.lock and composer.json
#COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
#RUN apt-get update && apt-get install -y \
#    build-essential \
#    libpng-dev \
#    libjpeg62-turbo-dev \
#    libfreetype6-dev \
#    locales \
#    zip \
#    jpegoptim optipng pngquant gifsicle \
#    docker-php-ext-install \
#    vim \
#    unzip \
#    git \
#    curl

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
#       for composer
        git \
#       for zip php extension
        libzip-dev \
#       for odbc extension
        gnupg2 \
#       for php intl extension
        libicu-dev \
#       for php pdo_pgsql extension
        libpq-dev \
#       for php http extension
#        libcurl4-openssl-dev \
#       for php http extension
#        libssl-dev \
#       for CI
        ssh \
        rsync \
        zip \
        unzip \
    && docker-php-ext-install \
#        bcmath \
        pdo \
        pdo_mysql \
        opcache \
        intl \
#        sockets \
        zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
#RUN docker-php-ext-install pdo_mysql mbstring zip intl opcache pdo
#RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
#RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
