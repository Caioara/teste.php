# Usar uma imagem base do PHP com Apache
FROM php:8.1-apache

# Instalar dependências necessárias, incluindo o Composer
RUN apt-get update && apt-get install -y \
    unzip \
    && docker-php-ext-install mysqli \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copiar os arquivos da aplicação para o diretório do servidor Apache
COPY . /var/www/html

# Configurar permissões
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Instalar dependências do Composer
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Expor a porta padrão do servidor Apache
EXPOSE 80

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
