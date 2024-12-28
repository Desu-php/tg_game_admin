FROM php:8.4-fpm

# Устанавливаем системные зависимости
USER root
RUN apt-get update && apt-get install -y --no-install-recommends \
    curl \
    zip \
    unzip \
    git \
    nano \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    postgresql-client \
    libzip-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo_pgsql mbstring exif intl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем Composer
RUN curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Аргументы и переменные окружения для пользователя
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

# Настраиваем пользователя и группу
RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Настраиваем права для пользователя www-data
RUN chown -R www-data:www-data /var/www/html

# Запуск контейнера
CMD ["php-fpm"]
