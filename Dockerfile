FROM php:8.0-fpm

# Instalar dependências
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    unzip \
    netcat \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    mysqli \
    zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configurar diretório de trabalho
WORKDIR /var/www

# Copiar arquivos do projeto
COPY . .

# Instalar dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Configurar permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/writable

# Limpar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Expor porta do PHP-FPM
EXPOSE 9000

# Copiar e configurar o script de entrypoint
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Mudar para o usuário www-data
USER www-data

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]