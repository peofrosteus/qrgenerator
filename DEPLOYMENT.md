# Deployment Guide

This guide explains how to deploy the QR Code Generator to a production environment.

## Prerequisites

- PHP 8.1 or higher
- Composer
- Web server (Apache/Nginx)
- SSL certificate (recommended)

## Production Deployment Steps

1. **Prepare the Application**

   ```bash
   # Clone the repository
   git clone <repository-url>
   cd qrgenerator

   # Install dependencies
   composer install --no-dev --optimize-autoloader
   ```

2. **Configure Web Server**

   ### Apache Configuration
   Create a virtual host configuration:

   ```apache
   <VirtualHost *:80>
       ServerName your-domain.com
       DocumentRoot /path/to/qrgenerator/public

       <Directory /path/to/qrgenerator/public>
           AllowOverride All
           Require all granted
       </Directory>

       ErrorLog ${APACHE_LOG_DIR}/qrgenerator-error.log
       CustomLog ${APACHE_LOG_DIR}/qrgenerator-access.log combined
   </VirtualHost>
   ```

   ### Nginx Configuration
   Create a server block:

   ```nginx
   server {
       listen 80;
       server_name your-domain.com;
       root /path/to/qrgenerator/public;

       index index.php;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
           fastcgi_index index.php;
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
           include fastcgi_params;
       }
   }
   ```

3. **Security Considerations**

   - Ensure the `public` directory is the only accessible directory
   - Set proper file permissions:
     ```bash
     chmod -R 755 /path/to/qrgenerator
     chmod -R 777 /path/to/qrgenerator/public/uploads  # if you add file uploads
     ```
   - Enable HTTPS using Let's Encrypt or your preferred SSL provider
   - Configure proper PHP settings in php.ini:
     ```ini
     display_errors = Off
     log_errors = On
     error_log = /path/to/error.log
     ```

4. **Performance Optimization**

   - Enable PHP OPcache
   - Configure web server caching
   - Consider using a CDN for static assets
   - Enable GZIP compression

5. **Monitoring**

   - Set up error logging
   - Configure monitoring tools (e.g., New Relic, Datadog)
   - Set up uptime monitoring

## Production Checklist

- [ ] All dependencies installed with `--no-dev`
- [ ] Web server properly configured
- [ ] SSL certificate installed
- [ ] File permissions set correctly
- [ ] Error logging configured
- [ ] Monitoring tools set up
- [ ] Backup strategy in place
- [ ] Security measures implemented

## Maintenance

1. **Regular Updates**
   ```bash
   composer update --no-dev
   ```

2. **Backup**
   - Regular database backups (if applicable)
   - File system backups
   - Configuration backups

3. **Monitoring**
   - Check error logs regularly
   - Monitor server resources
   - Review security updates

## Troubleshooting

Common issues and solutions:

1. **500 Internal Server Error**
   - Check PHP error logs
   - Verify file permissions
   - Ensure all dependencies are installed

2. **404 Not Found**
   - Verify web server configuration
   - Check .htaccess file (Apache)
   - Confirm file paths

3. **Permission Issues**
   - Review file ownership
   - Check directory permissions
   - Verify web server user permissions 