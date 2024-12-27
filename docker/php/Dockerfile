FROM php:8.4-fpm

# Устанавливаем системные зависимости и расширения для PostgreSQL
USER root
RUN apt-get update \
    && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql mbstring exif intl bcmath gd \
    && apt-get install -y postgresql-client

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Аргументы и переменные окружения для пользователя
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

# Настроиваем пользователя и группу
RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Настраиваем права для пользователя www-data
RUN chown -R www-data:www-data /var/www/html

# Запуск контейнера
CMD ["php-fpm"]
