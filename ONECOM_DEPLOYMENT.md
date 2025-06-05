# One.com Deployment Guide

This guide provides step-by-step instructions for deploying the QR Code Generator to One.com hosting.

## Prerequisites

1. One.com hosting account with SSH access
2. FTP client (like FileZilla) for file transfer
3. Composer installed on your local machine

## Deployment Steps

### 1. Prepare Your Local Environment

1. Make sure all your changes are committed to your local repository
2. Run `composer install` locally to generate the `composer.lock` file
3. Make the deployment script executable:
   ```bash
   chmod +x deploy.sh
   ```

### 2. Upload Files to One.com

#### Option 1: Using FTP

1. Connect to your One.com FTP server using your FTP client
2. Navigate to the `/www` directory
3. Create a new directory called `qrgenerator`
4. Upload all project files to this directory

#### Option 2: Using SFTP/SCP

1. From your local machine, use SCP to upload the files:
   ```bash
   scp -r * peo.nu@ssh.peo.nu:/www/qrgenerator/
   ```

### 3. Configure the Application

1. SSH into your One.com account:
   ```bash
   ssh peo.nu@ssh.peo.nu
   ```

2. Navigate to the project directory:
   ```bash
   cd /www/qrgenerator
   ```

3. Install dependencies:
   ```bash
   composer install --no-dev --optimize-autoloader
   ```

4. Set proper permissions:
   ```bash
   chmod 755 public
   chmod 644 public/.htaccess
   ```

### 4. Configure One.com Settings

1. Log in to your One.com control panel
2. Navigate to "Web Hosting" > "Settings"
3. Make sure PHP 8.1 or higher is selected
4. Enable the following PHP extensions:
   - gd
   - json
   - mbstring
   - xml

### 5. Test the Application

1. Visit your domain: `https://your-domain.com/qrgenerator/`
2. Test the QR code generation functionality
3. Check the error logs if you encounter any issues:
   ```bash
   tail -f /www/logs/error.log
   ```

## Troubleshooting

### Common Issues

1. **500 Internal Server Error**
   - Check file permissions
   - Verify PHP version
   - Check error logs

2. **Composer Issues**
   - Make sure Composer is installed on One.com
   - Try running `composer install` manually

3. **File Permission Issues**
   - Run: `chmod -R 755 /www/qrgenerator`
   - Run: `chmod 644 /www/qrgenerator/public/.htaccess`

### Support

If you encounter any issues:
1. Check the One.com error logs
2. Contact One.com support
3. Review the application logs in `/www/logs/`

## Maintenance

1. **Regular Updates**
   - Keep Composer dependencies updated
   - Monitor PHP version compatibility
   - Check for security updates

2. **Backup**
   - Regularly backup your files
   - Export your database if applicable

3. **Monitoring**
   - Monitor error logs
   - Check application performance
   - Review security logs 