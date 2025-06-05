#!/bin/bash

# Create necessary directories
mkdir -p /www/qrgenerator
mkdir -p /www/qrgenerator/public
mkdir -p /www/qrgenerator/src
mkdir -p /www/qrgenerator/templates

# Copy files to the correct locations
cp -r public/* /www/qrgenerator/public/
cp -r src/* /www/qrgenerator/src/
cp -r templates/* /www/qrgenerator/templates/
cp composer.json /www/qrgenerator/
cp composer.lock /www/qrgenerator/
cp .htaccess /www/qrgenerator/public/

# Set proper permissions
chmod 755 /www/qrgenerator
chmod 755 /www/qrgenerator/public
chmod 644 /www/qrgenerator/public/.htaccess

# Install dependencies
cd /www/qrgenerator
composer install --no-dev --optimize-autoloader

echo "Deployment completed successfully!" 