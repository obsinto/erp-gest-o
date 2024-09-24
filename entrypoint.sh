#!/bin/sh
set -e

echo "Entrypoint script is running"

# Tentar ajustar permissões (pode falhar se não for root, mas não interromperá o script)
chmod -R 755 /var/www/writable || true

exec php-fpm